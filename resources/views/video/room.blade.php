<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Video Chat Room</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito';
        }

        .actions {
            position: absolute;
            top: 90%;
            left: 40%;
            width: 40%;
            height: 40px;
            display: flex;
        }

        .mr-2 {
            margin-right: 20px;
        }

        .btn {
            padding: 10px;
            border-radius: 100%;
            color: #000;
            border: solid 1px #000;
        }

        .off {
            background: red;
            color: #fff;
            border: solid 1px red;
        }

        .btn i {
            margin: 0 auto;
        }

        .btn:hover {
            cursor: pointer;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="//media.twiliocdn.com/sdk/js/video/v1/twilio-video.min.js"></script>
    <script>
        var id = {{auth()->user()->id}};
        var audio = false;
        var video = true;
        if (id == 1) {
            audio = false;
        }
        Twilio.Video.createLocalTracks({
            audio: audio,
            video: video
        }).then(function(localTracks) {

            return Twilio.Video.connect('{{ $accessToken }}', {
                name: '{{ $roomName }}',
                tracks: localTracks,
                video: video
            });
        }).then(function(room) {
            $('#media-div').html('');
            room.participants.forEach(participantConnected);

            var previewContainer = document.getElementById(room.localParticipant.sid);
            if (!previewContainer || !previewContainer.querySelector('video')) {
                participantConnected(room.localParticipant, 1);
            }

            room.on('participantConnected', function(participant) {

                participantConnected(participant, 0);
            });

            room.on('participantDisconnected', function(participant) {
                participantDisconnected(participant);
            });
        });

        function participantConnected(participant, isLocal) {


            const div = document.createElement('div');
            div.id = participant.sid;
            if (isLocal == 1)
                div.setAttribute("style", "position:absolute;right:0;bottom:0;width:100px;height:100px");
            else
                div.setAttribute("style", "width:90%;height:90vh");
            div.innerHTML = "<div style='clear:both'>" + participant.identity + "</div>";

            participant.tracks.forEach(function(track) {

                trackAdded(div, track, isLocal)
            });

            participant.on('trackAdded', function(track) {
                trackAdded(div, track, isLocal)
            });
            participant.on('trackRemoved', trackRemoved);

            document.getElementById('media-div').appendChild(div);
        }

        function participantDisconnected(participant) {

            participant.tracks.forEach(trackRemoved);
            document.getElementById(participant.sid).remove();
        }
        // additional functions will be added after this point
        function trackAdded(div, track, isLocal) {
            div.appendChild(track.attach());
            var video = div.getElementsByTagName("video")[0];
            if (video) {
                video.setAttribute("style", "width:100%;height:90%");
            }
        }

        function trackRemoved(track) {
            track.detach().forEach(function(element) {
                element.remove()
            });
        }

        function leave(){
            var route = `{{(auth()->user()->doctor_id != NULL) ? route('appointments.index') : route('feedback.index',['id' => $_GET['appointment_id']])}}`;
            location.replace(route);
        }

        /*Utility Functions */

        function camera() {

            if (!video) {
                video = true;
                update(video, audio);

            } else {
                video = false;
                update(video, audio);
            }
        };

        function mic() {
            if (!audio) {
                audio = true;
                update(video, audio);

            } else {
                audio = false;
                update(video, audio);
            }
        }

        function update(video, audio) {
            // alert(video + "     " + audio)
            if (!audio) {
                $('#mic').addClass('off');
                $('#mici').removeClass('fa-microphone');
                $('#mici').addClass('fa-microphone-slash');
            } else {
                $('#mic').removeClass('off');
                $('#mici').addClass('fa-microphone');
                $('#mici').removeClass('fa-microphone-slash');
            }
            if (!video) {
                alert(video + "     " + audio)
                const video1 = document.querySelector('video');

                // A video's MediaStream object is available through its srcObject attribute
                const mediaStream = video1.srcObject;

                // Through the MediaStream, you can get the MediaStreamTracks with getTracks():
                const tracks = mediaStream.getTracks();

                // Tracks are returned as an array, so if you know you only have one, you can stop it with:

                $('#cam').addClass('off');
                $('#slash').css('display', 'block');
                tracks[0].stop();
            } else {
                $('#cam').removeClass('off');
                $('#slash').css('display', 'none');
            }
            Twilio.Video.createLocalTracks({
                audio: audio,
                video: video
            }).then(function(localTracks) {

                return Twilio.Video.connect('{{ $accessToken }}', {
                    name: '{{ $roomName }}',
                    tracks: localTracks,
                    video: video
                });
            }).then(function(room) {
                $('#media-div').html('');
                room.participants.forEach(participantConnected);

                var previewContainer = document.getElementById(room.localParticipant.sid);
                if (!previewContainer || !previewContainer.querySelector('video')) {
                    participantConnected(room.localParticipant, 1);
                }

                room.on('participantConnected', function(participant) {

                    participantConnected(participant, 0);
                });

                room.on('participantDisconnected', function(participant) {
                    participantDisconnected(participant);
                });
            });

        }
    </script>
</head>

<body class="antialiased">

    <div class="content">
        <div class="title m-b-md">
            Video Chat Rooms
        </div>

        <div id="media-div">

        </div>
        <div class="d-flex actions">
            <div class="btn btn-primary mr-2 p-2 off" id="mic" onclick="mic()" style="width:4rem;height:4rem;"><i class="fa fa-microphone-slash p-2" style="padding:32%; font-size:1.3rem;" id="mici"></i></div>
            <div class="btn btn-primary mr-2 p-2" id="cam" onclick="camera()" style="width:4rem;height:4rem;"><i class="fa fa-video-camera p-2" style="padding:28%; font-size:1.3rem;" id="cami"></i></div>
            <div class="btn btn-primary p-2 off" id="leave" onclick="leave()" style="width:4rem;height:4rem;transform: rotate(137deg);"><i class="fa fa-phone p-2" style="padding:27%; margin-bottom:1.3rem; font-size:1.3rem;"></i>
                <hr id="slash" style="height: 2rem;width: 2px;
                    background: #000;
                    transform: rotate(78deg);
                    bottom: -81%;
                    position: absolute;
                    left: 5.7rem;width:2px;background:#fff;display:none">
            </div>
        </div>
    </div>
</body>

</html>