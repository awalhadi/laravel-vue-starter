<!DOCTYPE html>
<html>
    <head>
        <title>{{ $fileName }}</title>
        <link href='https://fonts.googleapis.com/css?family=Great Vibes' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/css2?family=Herr+Von+Muellerhoff&display=swap" rel="stylesheet">
        <style>
            * {
                margin: 0;
                padding: 0;
            }

            @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&display=swap');

            body {
                font-family: 'Cormorant Garamond', serif;
                font-size: 16px;
                line-height: 1.5;
                color: #000;
            }

        </style>
    </head>
    <body style="height:100vh">
        <div class="page" style="position:relative;height:100%">
            <img src="{{ $bg_image }}" style="position: absolute;
                left:0;
                top:0;
                z-index:-10;
                width: 100%;
                height: 100%;
            "/>

            <table>
              {{-- @dd($certificateData->logo, optional($certificateData)->title) --}}
                <tbody>
                    <tr>
                        <td style="padding-top:40px;padding-left:80px">
                            <img src="{{ $certificateData->logo }}" alt="logo">
                        </td>
                    </tr>
                </tbody>
            </table>
            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td style="padding-top:100px;text-align: center;">
                            <h1 style="font-size: 54px;
                            font-weight: 500;
                            line-height: 1.2;
                            color: #000;text-transform: uppercase;letter-spacing: 8px;margin-bottom: 10px">{{ optional($certificateData)->title ?? 'Certificate' }}</h1>
                            <h4 style="font-size:28px;font-weight:500;text-transform: uppercase;color: #8F0000;letter-spacing: 3px;margin-bottom: 15px">
                                {{ optional($certificateData)->second_title ?? 'Of Achievement' }}</h4>
                            <p style="font-size:22px;text-transform: uppercase;color:#000000;font-weight:500;letter-spacing: 4px;">
                                {{ optional($certificateData)->third_title ?? 'Proudly presented to' }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td style="text-align:center;padding-top: 20px;">
                            <h1 style="font-family: 'Great Vibes';font-weight: 400;font-size: 79px;color:#8F0000;margin-bottom: 30px">{{ $user->full_name }}</h1>
                            <p style="font-weight:500;color:#000;font-size: 16px;">{{ optional($certificateData)->content ?? 'For successfully completing the' }} {{ $course->title }},
                                <br> on Mentors' Classroom. </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table style="width:60%;margin:auto;padding-top: 80px;">
                <tbody>
                    <tr>
                        <td>
                            <p style="font-size:19px;color: #000;">
                                Date: {{ \Carbon\Carbon::parse($studentProgress->craated_at)->isoFormat('MMMM Do YYYY') }}</p>
                        </td>
                        <td style="text-align:right">
                            <div class="signature">
                                <div style="text-align:center;display:inline-block">
                                    <h4 style="font-family: 'Herr Von Muellerhoff', cursive;font-weight: 400;font-size: 40px;border-bottom:2px solid #000"></h4>
                                    <p style="font-size:18px;color:#000">Course Instructor</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
