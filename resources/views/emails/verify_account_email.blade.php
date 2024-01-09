<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>

    <style>
        body {
            font-family: 'DM Sans', sans-serif;
            padding: 0;
            margin: 0;
        }

        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            width: 500px;
            min-height: 450px;
            padding: 50px 45px;
        }

        .bg-gray {
            background-color: #F8F9FB;
            border-radius: 8px;
            padding: 30px 38px;
        }

        .text {
            font-size: 15px;
            color: #06000df5;
            line-height: 22px;
            margin: 4px 0px 0px 0px;
        }

        .mb {
            margin-bottom: 24px;
        }

        .c-orange {
            color: #F88A32;
            text-decoration: none;
        }

        .footer {
            width: fit-content;
            margin: 50px auto 0px;
            text-align: center;
        }

        .icon-wrapper{
            margin: 0px 10px;
        }

        .footer p {
            font-size: 13px;
            margin-top: 2px;
        }

        .ex-width {
            width: 386px
        }

        .logo {
            width: 177px;
            margin: 5px auto 40px;
            display: block;
        }

        @media (max-width: 600px) {
            .ex-width {
                width: 100%
            }

            .container {
                padding: 30px 10px;
            }

            .bg-gray {
                padding: 40px 15px;
            }
        }
    </style>
</head>
<body >
<div class="wrapper" >
    <div class="container" >
        <div>
            <div class="bg-gray">
                <p class="text mb">Welcome {{ $name }}!</p>
                <p class="text mb ex-width">
                    Thank you for creating an account with Auth System! To ensure the security of your account and activate its full features, we need to verify your email address.
                </p>
                <p class="text mb ex-width">
                    Below is the otp needed to verify your account
                </p>
                <p class="mb" style="font-size: 14px; font-family: system-ui; font-weight: 600; text-align:center">{{ $otp }}</p>
            </div>
        </div>
        <div class="footer">
            <div style="display: flex; justify-content: center; ">
                <a href="#" class="icon-wrapper">
                    <svg width="9" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.16671 10.25H8.25004L9.08337 6.91663H6.16671V5.24996C6.16671 4.39214 6.16671 3.58329 7.83337 3.58329H9.08337V0.783376C8.81196 0.747334 7.78587 0.666626 6.70246 0.666626C4.44037 0.666626 2.83337 2.04734 2.83337 4.58305V6.91663H0.333374V10.25H2.83337V17.3333H6.16671V10.25Z" fill="#3A3341"/>
                    </svg>
                </a>
                <a href="#" class="icon-wrapper">
                    <svg width="15" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.50083 6.49996C7.11967 6.49996 6.00081 7.61921 6.00081 8.99996C6.00081 10.381 7.12008 11.5 8.50083 11.5C9.88192 11.5 11.0008 10.3807 11.0008 8.99996C11.0008 7.61888 9.88158 6.49996 8.50083 6.49996ZM8.50083 4.83329C10.8012 4.83329 12.6675 6.69754 12.6675 8.99996C12.6675 11.3004 10.8032 13.1666 8.50083 13.1666C6.20042 13.1666 4.33415 11.3024 4.33415 8.99996C4.33415 6.69957 6.1984 4.83329 8.50083 4.83329ZM13.9175 4.62425C13.9175 5.19934 13.4502 5.66593 12.8758 5.66593C12.3007 5.66593 11.8342 5.19863 11.8342 4.62425C11.8342 4.04988 12.3014 3.58329 12.8758 3.58329C13.4494 3.58257 13.9175 4.04988 13.9175 4.62425ZM8.50083 2.33329C6.43875 2.33329 6.10265 2.33875 5.14356 2.38146C4.49012 2.41213 4.05211 2.50002 3.64513 2.65802C3.28346 2.79828 3.02257 2.96578 2.7446 3.24375C2.46556 3.52279 2.29836 3.78298 2.15866 4.14482C2.0003 4.55273 1.91244 4.99005 1.88231 5.64258C1.83919 6.56262 1.83415 6.88417 1.83415 8.99996C1.83415 11.062 1.83961 11.3981 1.88231 12.3571C1.913 13.0103 2.001 13.449 2.15861 13.855C2.29925 14.2171 2.46708 14.4786 2.74371 14.7553C3.02386 15.035 3.28482 15.2028 3.64322 15.3411C4.05516 15.5004 4.4929 15.5884 5.14343 15.6185C6.06348 15.6615 6.38502 15.6666 8.50083 15.6666C10.5629 15.6666 10.899 15.6611 11.858 15.6185C12.5097 15.5879 12.9487 15.4996 13.3558 15.3421C13.717 15.2019 13.9793 15.0335 14.2562 14.757C14.5363 14.4765 14.7037 14.2161 14.8422 13.8569C15.0011 13.4465 15.0892 13.0081 15.1193 12.3574C15.1624 11.4373 15.1675 11.1157 15.1675 8.99996C15.1675 6.93789 15.162 6.6018 15.1193 5.64277C15.0887 4.99084 15.0004 4.5512 14.8427 4.14428C14.7028 3.78361 14.5347 3.52192 14.257 3.24375C13.9775 2.96425 13.718 2.7974 13.3559 2.65781C12.9483 2.49958 12.5103 2.41159 11.8582 2.38147C10.9382 2.33833 10.6166 2.33329 8.50083 2.33329ZM8.50083 0.666626C10.7647 0.666626 11.0473 0.674959 11.9362 0.716626C12.823 0.757601 13.4279 0.897876 13.9592 1.10413C14.5084 1.31593 14.9723 1.60204 15.4355 2.06523C15.898 2.52843 16.1842 2.99371 16.3967 3.54163C16.6022 4.07218 16.7425 4.67773 16.7842 5.56454C16.8237 6.45343 16.8342 6.73607 16.8342 8.99996C16.8342 11.2639 16.8258 11.5465 16.7842 12.4354C16.7432 13.3222 16.6022 13.927 16.3967 14.4583C16.1848 15.0076 15.898 15.4715 15.4355 15.9347C14.9723 16.3972 14.5063 16.6833 13.9592 16.8958C13.4279 17.1014 12.823 17.2416 11.9362 17.2833C11.0473 17.3229 10.7647 17.3333 8.50083 17.3333C6.23692 17.3333 5.95428 17.325 5.0654 17.2833C4.17859 17.2423 3.57442 17.1014 3.04248 16.8958C2.49386 16.684 2.02928 16.3972 1.56609 15.9347C1.1029 15.4715 0.817481 15.0055 0.604981 14.4583C0.398731 13.927 0.259147 13.3222 0.217481 12.4354C0.177897 11.5465 0.16748 11.2639 0.16748 8.99996C0.16748 6.73607 0.175814 6.45343 0.217481 5.56454C0.258447 4.67704 0.398731 4.07288 0.604981 3.54163C0.816781 2.99302 1.1029 2.52843 1.56609 2.06523C2.02928 1.60204 2.49456 1.31663 3.04248 1.10413C3.57373 0.897876 4.1779 0.758293 5.0654 0.716626C5.95428 0.677043 6.23692 0.666626 8.50083 0.666626Z" fill="#3A3341"/>
                    </svg>
                </a>
                <a href="#" class="icon-wrapper">
                    <svg width="18" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.8146 3.2207H17.1147L12.0897 8.96399L18.0012 16.7793H13.3725L9.74714 12.0394L5.59892 16.7793H3.29742L8.67221 10.6362L3.00122 3.2207H7.74744L11.0244 7.5532L14.8146 3.2207ZM14.0073 15.4026H15.2818L7.05491 4.52511H5.68722L14.0073 15.4026Z" fill="#3A3341"/>
                    </svg>
                </a>
            </div>
            <p class="text">© Auth 2023 </p>
            <p class="text">Do you need help? <a class="c-orange" href="#">Contact support</a></p>
        </div>
    </div>
</div>
</body>
</html>