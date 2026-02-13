import flatpickr from "flatpickr";

const DISPLAY_DATE_FORMAT = "d/m/Y";
const DISPLAY_DATE_FORMAT_SHORT = "d/m";
const API_DATE_FORMAT = "Y-m-d";
const API_DATE_FORMAT2 = "d-m-Y";
const API_TIME_FORMAT = "H:i";

function toStartOfDay(date) {
    const d = new Date(date);
    d.setHours(0, 0, 0, 0);
    return d;
}

function addDays(date, days) {
    const d = new Date(date);
    d.setDate(d.getDate() + days);
    return d;
}

function formatDate(date, format) {
    return flatpickr.formatDate(date, format);
}

function dateLabel(from, to, format) {
    return `${formatDate(from, format)} - ${formatDate(to, format)}`;
}

function splitGuestsIntoRooms(guests, maxPerRoom = 2) {
    const totalGuests = Math.max(1, Number(guests) || 1);
    const rooms = [];
    let remaining = totalGuests;

    while (remaining > 0) {
        const roomGuests = Math.min(maxPerRoom, remaining);
        rooms.push(roomGuests);
        remaining -= roomGuests;
    }

    return rooms;
}

export default function (config) {
    return {
        isDropdownOpen: false,
        activeType: config.activeType || 0,
        types: [
            {name: "stay", link: "https://booking.profitroom.com/en/barnhambroom/pricelist/multiroom/offer"},
            {name: "eat", "link": "/booking-resdiary/"},
            {name: "golf", "link": "https://barnham.hub.clubv1.com/Visitors/TeeSheet"},
            {name: "spa", "link": "https://barnhambroom.try.be/"},
            {
                name: "meeting",
                "link": "https://www.venuedirectory.com/united-kingdom/top-meeting-rooms-in/norwich/barnham-broom-resort/6410"
            },
        ],
        isGuestsDropdownOpen: false,
        isSpaTypeDropdownOpen: false,

        checkIn: null,
        checkOut: null,
        dayDate: null,
        dayTime: null,
        guests: 1,
        spaTypes: [
            {name: "Any type", link: ""},
            {name: "Spa Days", link: "offerings/categories/64db51287467371dc40b0603/spa-days"},
            {name: "Body Treatments", link: "offerings/categories/64db4ad19a1fcc1345083b73/body-treatments"},
            {name: "Massage", link: "offerings/categories/64c8deab92fabebac80229a2/massage"},
            {name: "Eye Treatments", link: "offerings/categories/64db4ae824be9515740b4835/eye-treatments"},
            {name: "Facials", link: "offerings/categories/64db4ac544b8464a4e0e8c67/facials"},
            {name: "Nails", link: "offerings/categories/64db4b0c3b6a7d9e5706d937/nails"},
            {name: "Waxing", link: "offerings/categories/64db4ade24be9515740b4834/waxing"},
            {name: "Couples Treatments", link: "offerings/categories/693fd1a411aeac19880026b7/couples-treatments"},
            {name: "Mother's Day Spa", link: "offerings/categories/6977447ec9bacd4dcf0e8d50/mother's-day-spa"},
            {name: "Maternity", link: "offerings/categories/64db4b032b7044c77b0f3b84/maternity"},
            {name: "Hen Party Spa Days", link: "offerings/categories/6978ceb02853c5423003cc40/hen-party-spa-days"}
        ],
        activeSpaType: 0,

        rangeDateLabel: "Select Date",
        timeLabel: "Select Time",

        rangeDatePicker: null,
        datePicker: null,
        timePicker: null,

        init() {
            this.initPickers();
            this.syncLabels();
        },

        initPickers() {
            this.rangeDatePicker = flatpickr(this.$refs.rangeDateInput, {
                mode: "range",
                minDate: "today",
                disableMobile: true,
                clickOpens: false,
                positionElement: this.$refs.rangeDateTrigger,
                position: Alpine.store("page").mobileMode ? "auto" : "auto center",
                onChange: (selectedDates) => {
                    this.checkIn = selectedDates[0] ? toStartOfDay(selectedDates[0]) : null;
                    this.checkOut = selectedDates[1] ? toStartOfDay(selectedDates[1]) : null;
                    this.syncLabels();
                },
            });

            this.datePicker = flatpickr(this.$refs.dateInput, {
                minDate: "today",
                disableMobile: true,
                clickOpens: false,
                positionElement: this.$refs.rangeDateTrigger,
                position: Alpine.store("page").mobileMode ? "auto" : "auto center",
                onChange: (selectedDates) => {
                    this.dayDate = selectedDates[0] ? toStartOfDay(selectedDates[0]) : null;
                    this.syncLabels();
                },
            });

            this.timePicker = flatpickr(this.$refs.timeInput, {
                enableTime: true,
                noCalendar: true,
                dateFormat: API_TIME_FORMAT,
                time_24hr: true,
                minuteIncrement: 15,
                minTime: "18:00",
                maxTime: "21:00",
                disableMobile: true,
                clickOpens: false,
                positionElement: this.$refs.timeTrigger,
                position: Alpine.store("page").mobileMode ? "auto" : "auto center",
                onChange: (selectedDates) => {
                    this.dayTime = selectedDates[0] || null;
                    this.syncLabels();
                },
            });
        },

        setActiveType(index) {
            if (this.activeType === index) {
                if (Alpine.store("page").mobileMode) this.isDropdownOpen = false;
                return;
            }

            this.activeType = index;
            if (Alpine.store("page").mobileMode) this.isDropdownOpen = false;
            this.isGuestsDropdownOpen = false;
            this.isSpaTypeDropdownOpen = false;
            //this.resetSelections();
            this.syncLabels();
        },

        clickOutside() {
            if (Alpine.store("page").mobileMode) this.isDropdownOpen = false;
        },

        currentTypeName() {
            return this.types?.[this.activeType]?.name || "stay";
        },

        currentTypeLink() {
            return this.types?.[this.activeType]?.link || "";
        },

        guestLabel() {
            return this.guests === 1 ? "1 Adult" : `${this.guests} Adults`;
        },

        setGuests(value) {
            this.guests = value;
            this.isGuestsDropdownOpen = false;
        },

        spaTypeLabel() {
            return this.spaTypes?.[this.activeSpaType]?.name;
        },

        spaTypeLink() {
            return this.spaTypes?.[this.activeSpaType]?.link;
        },

        setSpaType(index) {
            this.activeSpaType = index;
            this.isSpaTypeDropdownOpen = false;
        },

        requiresTime() {
            const type = this.currentTypeName();
            return type === "eat" || type === "golf";
        },

        syncLabels() {
            const type = this.currentTypeName();
            const labelDateFormat = Alpine.store("page").mobileMode && type === "stay" ? DISPLAY_DATE_FORMAT_SHORT : DISPLAY_DATE_FORMAT;

            if (type === "stay") {
                this.rangeDateLabel =
                    this.checkIn && this.checkOut
                        ? dateLabel(this.checkIn, this.checkOut, labelDateFormat)
                        : "Select Date";
            } else {
                this.rangeDateLabel = this.dayDate ? formatDate(this.dayDate, labelDateFormat) : "Select Date";
            }

            this.timeLabel = this.dayTime ? formatDate(this.dayTime, API_TIME_FORMAT) : "Select Time";
        },

        resetSelections() {
            this.checkIn = null;
            this.checkOut = null;
            this.dayDate = null;
            this.dayTime = null;

            if (this.rangeDatePicker) this.rangeDatePicker.clear();
            if (this.datePicker) this.datePicker.clear();
            if (this.timePicker) this.timePicker.clear();
        },

        openDateRangePicker() {
            const type = this.currentTypeName();
            if (type === "stay") {
                this.rangeDatePicker.set("minDate", "today");
                if (this.checkIn && this.checkOut) {
                    this.rangeDatePicker.setDate([this.checkIn, this.checkOut], false);
                } else {
                    this.rangeDatePicker.clear();
                }
                this.rangeDatePicker.open();
                return;
            }

            this.datePicker.set("minDate", "today");
            if (this.dayDate) {
                this.datePicker.setDate(this.dayDate, false);
            } else {
                this.datePicker.clear();
            }
            this.datePicker.open();
        },

        openTimePicker() {
            if (!this.requiresTime()) return;
            if (this.dayTime) {
                this.timePicker.setDate(this.dayTime, false);
            } else {
                this.timePicker.clear();
            }
            this.timePicker.open();
        },

        submitSearch() {
            const type = this.currentTypeName();
            let link = this.currentTypeLink();
            if (type === "spa")
                link += this.spaTypeLink()
            const url = new URL(link, window.location.origin);

            if (type === "stay") {
                if (!this.checkIn || !this.checkOut) return;
                url.searchParams.set("check-in", formatDate(this.checkIn, API_DATE_FORMAT));
                url.searchParams.set("check-out", formatDate(this.checkOut, API_DATE_FORMAT));
                url.searchParams.set("currency", "GBP");
                const roomGuestKeys = [];
                url.searchParams.forEach((_value, key) => {
                    if (/^r\d+_adults$/.test(key)) roomGuestKeys.push(key);
                });
                roomGuestKeys.forEach((key) => url.searchParams.delete(key));

                const rooms = splitGuestsIntoRooms(this.guests, 2);
                rooms.forEach((roomGuests, index) => {
                    url.searchParams.set(`r${index + 1}_adults`, String(roomGuests));
                });

                url.searchParams.set("no-cache", "");
            } else if (type === "eat") {
                if (!this.dayDate || !this.dayTime) return;
                url.searchParams.set("date", formatDate(this.dayDate, API_DATE_FORMAT));
                url.searchParams.set("time", formatDate(this.dayTime, API_TIME_FORMAT));

            } else if (type === "golf") {
                if (!this.dayDate || !this.dayTime) return;
                url.searchParams.set("date", formatDate(this.dayDate, API_DATE_FORMAT));
                //url.searchParams.set("time", formatDate(this.dayTime, API_TIME_FORMAT));
                url.searchParams.set("courseId", 12649);

            } else if (type === "spa") {
                if (!this.dayDate) return;
                url.searchParams.set("date", formatDate(this.dayDate, API_DATE_FORMAT));

            } else if (type === "eat" || type === "golf") {
                if (!this.dayDate || !this.dayTime) return;
                url.searchParams.set("date", formatDate(this.dayDate, API_DATE_FORMAT));
                url.searchParams.set("time", formatDate(this.dayTime, API_TIME_FORMAT));

            } else if (type === "spa") {
                if (!this.dayDate) return;
                url.searchParams.set("date", formatDate(this.dayDate, API_DATE_FORMAT));

            } else if (type === "meeting") {
                if (!this.dayDate) return;
                url.searchParams.set("duration", 1);
                url.searchParams.set("startdate", formatDate(this.dayDate, API_DATE_FORMAT2));
                url.searchParams.set("delegates", this.guests);
                url.searchParams.set("keyword", "Barnham-Broom-Resort");
                url.searchParams.set("page", "");
            }

            window.open(url.toString(), "_blank", "noopener,noreferrer");
        },
    };
}
