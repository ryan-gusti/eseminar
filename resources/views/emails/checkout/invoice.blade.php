<!DOCTYPE html>
<html
  lang="en"
  xmlns:v="urn:schemas-microsoft-com:vml"
  xmlns:o="urn:schemas-microsoft-com:office:office"
>
  <head>
    <meta charset="utf-8" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="format-detection"
      content="telephone=no, date=no, address=no, email=no"
    />
    <!--[if mso]>
      <xml
        ><o:officedocumentsettings
          ><o:pixelsperinch>96</o:pixelsperinch></o:officedocumentsettings
        ></xml
      >
    <![endif]-->
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700"
      rel="stylesheet"
      media="screen"
    />
    <style>
      .hover-underline:hover {
        text-decoration: underline !important;
      }
      @media (max-width: 600px) {
        .sm-w-full {
          width: 100% !important;
        }
        .sm-px-24 {
          padding-left: 24px !important;
          padding-right: 24px !important;
        }
        .sm-py-32 {
          padding-top: 32px !important;
          padding-bottom: 32px !important;
        }
      }
    </style>
  </head>
  <body
    style="
      margin: 0;
      width: 100%;
      padding: 0;
      word-break: break-word;
      -webkit-font-smoothing: antialiased;
    "
  >
    <div
      style="
        font-family: 'Montserrat', sans-serif;
        mso-line-height-rule: exactly;
        display: none;
      "
    >
      This is an invoice for your purchase on undefined. Please submit payment
      by undefined
    </div>
    <div
      role="article"
      aria-roledescription="email"
      aria-label=""
      lang="en"
      style="
        font-family: 'Montserrat', sans-serif;
        mso-line-height-rule: exactly;
      "
    >
      <table
        style="
          width: 100%;
          font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif;
        "
        cellpadding="0"
        cellspacing="0"
        role="presentation"
      >
        <tr>
          <td
            align="center"
            style="
              mso-line-height-rule: exactly;
              background-color: #eceff1;
              font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif;
            "
          >
            <table
              class="sm-w-full"
              style="width: 600px"
              cellpadding="0"
              cellspacing="0"
              role="presentation"
            >
              <tr>
                <td
                  class="sm-py-32 sm-px-24"
                  style="
                    mso-line-height-rule: exactly;
                    padding: 48px;
                    text-align: center;
                    font-family: Montserrat, -apple-system, 'Segoe UI',
                      sans-serif;
                  "
                >
                  <a
                    href="https://1.envato.market/vuexy_admin"
                    style="
                      font-family: 'Montserrat', sans-serif;
                      mso-line-height-rule: exactly;
                    "
                  >
                    <img
                      src="{{ asset('backend/app-assets/images/email/logo-eseminar.png') }}"
                      width="250"
                      alt="Vuexy Admin"
                      style="
                        max-width: 100%;
                        vertical-align: middle;
                        line-height: 100%;
                        border: 0;
                      "
                    />
                  </a>
                </td>
              </tr>
              <tr>
                <td
                  align="center"
                  class="sm-px-24"
                  style="
                    font-family: 'Montserrat', sans-serif;
                    mso-line-height-rule: exactly;
                  "
                >
                  <table
                    style="width: 100%"
                    cellpadding="0"
                    cellspacing="0"
                    role="presentation"
                  >
                    <tr>
                      <td
                        class="sm-px-24"
                        style="
                          mso-line-height-rule: exactly;
                          border-radius: 4px;
                          background-color: #ffffff;
                          padding: 48px;
                          text-align: left;
                          font-family: Montserrat, -apple-system, 'Segoe UI',
                            sans-serif;
                          font-size: 16px;
                          line-height: 24px;
                          color: #626262;
                        "
                      >
                        <p
                          style="
                            font-family: 'Montserrat', sans-serif;
                            mso-line-height-rule: exactly;
                            margin-bottom: 0;
                            font-size: 20px;
                            font-weight: 600;
                          "
                        >
                          Halo
                        </p>
                        <p
                          style="
                            font-family: 'Montserrat', sans-serif;
                            mso-line-height-rule: exactly;
                            margin-top: 0;
                            font-size: 24px;
                            font-weight: 700;
                            color: #000000;
                          "
                        >
                          {{ $invoice->user->name }}!
                        </p>
                        <p
                          style="
                            font-family: 'Montserrat', sans-serif;
                            mso-line-height-rule: exactly;
                            margin: 0;
                            margin-bottom: 24px;
                          "
                        >
                          Terima kasih! kamu telah berhasil mendaftar ke event:
                        </p>
                        <div style="box-sizing: border-box">
                          <h1
                            style="
                              box-sizing: border-box;
                              color: #2f3133;
                              font-size: 19px;
                              font-weight: bold;
                              margin-top: 0;
                              text-align: center;
                            "
                          >
                            {{ $invoice->event->title }}
                          </h1>
                          <h2
                            style="
                              font-family: Avenir, Helvetica, sans-serif;
                              box-sizing: border-box;
                              color: #2f3133;
                              font-size: 16px;
                              font-weight: bold;
                              margin-top: 0;
                              text-align: center;
                            "
                          >
                            ({{ date('d F Y H:m', strtotime($invoice->event->time)) }})
                          </h2>
                        </div>
                        <p
                          style="
                            box-sizing: border-box;
                            color: #74787e;
                            font-size: 16px;
                            line-height: 1.5em;
                            margin-top: 0;
                            text-align: left;
                          "
                        >
                          Silahkan download tiket dengan klik tombol di bawah
                          ini atau tiket bisa didapat melalui aplikasi / web
                          <span class="il">ESeminar</span>
                        </p>
                        <table
                          align="right"
                          style="
                            margin-left: auto;
                            margin-right: auto;
                            width: 100%;
                            text-align: center;
                          "
                          cellpadding="0"
                          cellspacing="0"
                          role="presentation"
                        >
                          <tr>
                            <td
                              align="right"
                              style="
                                font-family: 'Montserrat', sans-serif;
                                mso-line-height-rule: exactly;
                              "
                            >
                              <table
                                style="margin-top: 24px; margin-bottom: 24px"
                                cellpadding="0"
                                cellspacing="0"
                                role="presentation"
                              >
                                <tr>
                                  <td
                                    align="right"
                                    style="
                                      mso-line-height-rule: exactly;
                                      mso-padding-alt: 16px 24px;
                                      border-radius: 4px;
                                      background-color: #7367f0;
                                      font-family: Montserrat, -apple-system,
                                        'Segoe UI', sans-serif;
                                    "
                                  >
                                    <a
                                      href="{{ url('user/ticket') }}"
                                      style="
                                        font-family: 'Montserrat', sans-serif;
                                        mso-line-height-rule: exactly;
                                        display: block;
                                        padding-left: 24px;
                                        padding-right: 24px;
                                        padding-top: 16px;
                                        padding-bottom: 16px;
                                        font-size: 16px;
                                        font-weight: 600;
                                        line-height: 100%;
                                        color: #ffffff;
                                        text-decoration: none;
                                      "
                                      >Lihat Tiket &rarr;</a
                                    >
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                        <p
                          style="
                            font-family: 'Montserrat', sans-serif;
                            mso-line-height-rule: exactly;
                            margin-top: 6px;
                            margin-bottom: 20px;
                            font-size: 16px;
                            line-height: 24px;
                          "
                        >
                          Jika kamu masih ada pertanyaan silahkan kontak panitia
                          dihalaman detail event ya, atau dapat ke email
                          <a
                            href="mailto:help@eseminar.com"
                            style="
                              font-family: 'Montserrat', sans-serif;
                              mso-line-height-rule: exactly;
                            "
                            >help@eseminar</a
                          >
                          untuk bantuan.
                        </p>
                        <p
                          style="
                            font-family: 'Montserrat', sans-serif;
                            mso-line-height-rule: exactly;
                            margin-top: 6px;
                            margin-bottom: 20px;
                            font-size: 16px;
                            line-height: 24px;
                          "
                        >
                          Diharapkan kehadirannya pada event tersebut!
                          <br />ESeminar
                        </p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td
                  style="
                    font-family: 'Montserrat', sans-serif;
                    mso-line-height-rule: exactly;
                    height: 20px;
                  "
                ></td>
              </tr>
              <tr>
                <td
                  style="
                    mso-line-height-rule: exactly;
                    padding-left: 48px;
                    padding-right: 48px;
                    font-family: Montserrat, -apple-system, 'Segoe UI',
                      sans-serif;
                    font-size: 14px;
                    color: #eceff1;
                  "
                >
                  <p
                    align="center"
                    style="
                      font-family: 'Montserrat', sans-serif;
                      mso-line-height-rule: exactly;
                      margin-bottom: 16px;
                      cursor: default;
                    "
                  >
                    <a
                      href="https://www.facebook.com/pixinvents"
                      style="
                        font-family: 'Montserrat', sans-serif;
                        mso-line-height-rule: exactly;
                        color: #263238;
                        text-decoration: none;
                      "
                      ><img
                        src="{{ asset('backend/app-assets/images/email/facebook.png') }}"
                        width="17"
                        alt="Facebook"
                        style="
                          max-width: 100%;
                          vertical-align: middle;
                          line-height: 100%;
                          border: 0;
                          margin-right: 12px;
                        "
                    /></a>
                    &bull;
                    <a
                      href="https://twitter.com/pixinvents"
                      style="
                        font-family: 'Montserrat', sans-serif;
                        mso-line-height-rule: exactly;
                        color: #263238;
                        text-decoration: none;
                      "
                      ><img
                        src="{{ asset('backend/app-assets/images/email/twitter.png') }}"
                        width="17"
                        alt="Twitter"
                        style="
                          max-width: 100%;
                          vertical-align: middle;
                          line-height: 100%;
                          border: 0;
                          margin-right: 12px;
                        "
                    /></a>
                    &bull;
                    <a
                      href="https://www.instagram.com/pixinvents"
                      style="
                        font-family: 'Montserrat', sans-serif;
                        mso-line-height-rule: exactly;
                        color: #263238;
                        text-decoration: none;
                      "
                      ><img
                        src="{{ asset('backend/app-assets/images/email/instagram.png') }}"
                        width="17"
                        alt="Instagram"
                        style="
                          max-width: 100%;
                          vertical-align: middle;
                          line-height: 100%;
                          border: 0;
                          margin-right: 12px;
                        "
                    /></a>
                  </p>
                  <center>
                    <p
                      style="
                        font-family: 'Montserrat', sans-serif;
                        mso-line-height-rule: exactly;
                        color: #263238;
                      "
                    >
                      © 2022 ESeminar. All rights reserved.
                    </p>
                  </center>
                </td>
              </tr>
              <tr>
                <td
                  style="
                    font-family: 'Montserrat', sans-serif;
                    mso-line-height-rule: exactly;
                    height: 16px;
                  "
                ></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </div>
  </body>
</html>
