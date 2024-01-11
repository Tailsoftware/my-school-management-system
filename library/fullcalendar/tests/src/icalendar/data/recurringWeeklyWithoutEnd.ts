export default `BEGIN:VCALENDAR
VERSION:2.0
CALSCALE:GREGORIAN
METHOD:PUBLISH
X-WR-CALNAME:events@fullcalendar.test
X-WR-TIMEZONE:Europe/Paris
BEGIN:VEVENT
DTSTART;TZID=Europe/Zurich:20190401T173000
RRULE:FREQ=WEEKLY;WKST=MO;BYDAY=MO
DTSTAMP:20201006T124223Z
ORGANIZER;CN=Testy McTestface:mailto:test@fullcalendar.test
UID:12345678
CREATED:20181210T150458Z
DESCRIPTION:
LAST-MODIFIED:20190508T170523Z
LOCATION:
SEQUENCE:0
STATUS:CONFIRMED
SUMMARY:Weekly Monday meeting
TRANSP:OPAQUE
END:VEVENT
END:VCALENDAR`
