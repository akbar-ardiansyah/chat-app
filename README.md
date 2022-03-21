# chat-app
Application features:
Header

Chat tab - berlabel hijau ketika user sedang aktif 
Unread messages counter
Font Awesome icons
Chat page

Chat area (includ baris rata kiri dan rata kanan)
Message (isi pesan, tanggal)
Menampilkan nickname hanya untuk pesan yang di terima


UserProfile component - possibility to change user name
Interface color component - change the color theme of the app
ClockDisplay component - change the time mode 12h or 24h, shown with each message
Send messages with Ctrl+Enter - On/Off
LanguageSwitcher - dropdown menu allowing changing the language of the app (currently English and Deutsch are supported)
Reset button - resets all settings stored to local storage
Improvements (done and pending)
Add video chat feature.
👍 Added AM/PM time formatting for when 12h mode is selected.
👍 Added possibility to send message via ENTER by default. If the setting to send messages with CTRL+ENTER is ON, then this is going to be the only way (except via mouse/touch of course).
👍 Optimized for iDevices (media queries).
👍 Fix blinking/active class for the Chat tab issue - related to React Router not able to properly re-render connected components https://github.com/ReactTraining/react-router/blob/master/packages/react-router/docs/guides/blocked-updates.md
👍 Clear input field when new message is sent.
👍 Auto scroll to bottom main chat area when new messages exceed available space.
👍 Prevent 'doubling messages' (or multiple messages duplicates when more clients are connected).
👍 Add unit tests for the react components.
Add unit tests for redux stuff - reducers, store, action creators.
👍 Add media queries for responsiveness - test and adjust on more devices.
👍 Add demo to heroku.
👍 Add nice how-to in README.
Add animations for the messages (animejs).
Add sounds (with options to turn on/off in settings).
Add more color themes.
Add welcome message (broadcasts on user connected).
👍 Add icons ( use font awesome).
History of all the conversations.
Handle case when socket's connection state change (visually).
Handle case when there has been a socket error.
Handle case when a very long word (without) spaces is entered and it goes beyond the message background color.
👍 Emoticons support - such as :D, :P, :), ;), 😉, ❤️, etc.
👍 Link Parser - youtube link (embedded video should appear), link to an image (embedded image should appear), all other links should appear as anchor.
