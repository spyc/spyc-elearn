@extends('layouts.app')

@section('wrap')
    <div class="jumbotron">
        <div class="container">
            <h2>Project WHJSLS Terms of Service</h2>
        </div>
    </div>
    <div class="container">
        <div class="container">
            <p>
            By using the elearn.pyc.edu.hk web site ("Elearn"),
            or any services of Project WHJSLS ("WHJSLS"),
            you are agreeing to be bound by the following terms and conditions ("Terms of Service").
            <strong style="font-size: 16px;">
                If you are entering into this agreement on behalf of a legal entity,
                you represent that you have the authority to bind such entity,
                its affiliates to these terms and conditions,
                in which case the terms "YOU" or "YOUR" shall refer to such entity,
                its affiliates and users associated with it.
                If you do not have such authority, or if you do not agree with these terms and conditions,
                you must not accept this agreement and may not use the services.
            </strong>
            </p>
            <p>
                If WHJSLS makes material changes to these Terms,
                we will notify you by posting a notice on our site before the changes are effective.
                Any new features that augment or enhance the current Service,
                including the release of new tools and resources,
                shall be subject to the Terms of Service.
                Continued use of the Service after any such changes shall constitute your consent to such changes.
            </p>
        </div>

        <div id="general" class="container">
            <h3>A. General Term</h3>
            <ol class="article">
                <li>
                    As WHJSLS is the hoster for the school community and society,
                    the site may have different terms of service.
                    You may refer to the terms of service at the bottom of the page.
                </li>

                <li>
                    The time zone the WHJSLS using is the Hong Kong SAR Time Zone (+08:00).
                </li>

                <li>
                    Your use of the Elearn is at your sole risk.
                    The service is provided on an "as is" and "as available" basis.
                </li>

                <li>
                    You understand that Elearn uses Shatin Pui Ying College vendors and
                    virtual machine to provide the necessary hardware, software, networking,
                    storage, and related technology required to run the Elearn.
                </li>

                <li>
                    You must not modify, adapt or hack the Elearn
                    or modify another website so as to falsely imply that
                    it is associated with the Elearn, WHJSLS, or any other WHJSLS service.
                </li>

                <li>
                    You must not upload, post, host, or transmit unsolicited email, SMSs, or "spam" messages.
                </li>

                <li>
                    You must not transmit any worms or viruses or any code of a destructive nature.
                </li>
            </ol>
        </div>

        <div id="account" class="container">
            <h3>B. Account Terms</h3>
            <ol class="article">
                <li>
                    You must be a student, teacher or staff of Shatin Pui Ying College to be an user.
                </li>

                <li>
                    Your account will be locked or removed after you have left the school.
                </li>

                <li>
                    WHJSLS cannot and will not handle your sign-in process,
                    it would be done by the Shatin Pui Ying College Single Sign-On Service.
                </li>

                <li>
                    Your login may only be used by one person - a single login shared by multiple people is not permitted.
                </li>

                <li>
                    You are responsible for maintaining the security of your account and password.
                    WHJSLS cannot and will not be liable for any loss or damage from your failure to comply with this security obligation.
                </li>

                <li>
                    You are responsible for all Content posted and activity that occurs under your account
                </li>

                <li>
                    You may not use the Elearn for any illegal or unauthorized purpose.
                    You must not, in the use of the Service,
                    violate any laws in your jurisdiction (including but not limited to copyright or trademark laws).
                </li>

                <li>
                    All the illegal or unauthorized action on the Elearn or other WHJSLS services
                    would be passed to the Discipline Committee or even the Hong Kong Police.
                </li>
            </ol>
        </div>

        <div id="api" class="container">
            <h3>C. API Terms</h3>
            <p>
                Users may access their account data via an API (Application Program Interface).
                Any use of the API, including use of the API through a third-party product that accesses WHJSLS,
                is bound by these Terms of Service plus the following specific terms:
            </p>
            <ol class="article">
                <li>
                    You expressly understand and agree that WHJSLS shall not be liable for any direct,
                    indirect, pecial, consequential or exemplary damages, including but not limited to,
                    damages for loss of profits, goodwill, use, data or other intangible losses
                    (even if WHJSLS has been advised of the possibility of such damages),
                    resulting from your use of the API or third-party products that access data via the API.
                </li>

                <li>
                    Abuse or excessively frequent requests to WHJSLS via the API may result in
                    the temporary or permanent suspension of your account's access to the API.
                    WHJSLS, in its sole discretion, will determine abuse or excessive usage of the API.
                    WHJSLS will make a reasonable attempt via email to warn the account owner prior to suspension.
                </li>

                <li>
                    WHJSLS reserves the right at any time to modify or discontinue, temporarily or permanently,
                    your access to the API (or any part thereof) with or without notice.
                </li>
            </ol>
        </div>

        <div id="modifications" class="container">
            <h3>D. Modifications and Maintenance to the Service</h3>
            <ol class="article">
                <li>
                    WHJSLS reserves the right at any time and from time to time to modify or discontinue,
                    temporarily or permanently, the Elearn (or any part thereof) with or without notice.
                </li>
            </ol>
        </div>

        <div id="copyright" class="container">
            <h3>E. Copyright and Content Ownership</h3>
            <ol class="article">
                <li>
                    The content of each page may not be the same.
                    It might be all right reserved,
                    licensed under Creative Commons Attribution-ShareAlike 3.0 Hong Kong License (CC BY-SA 3.0 HK),
                    or Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License (CC BY-NC-SA 4.0).
                    For detail, please refer to the footer of the page.
                </li>
                <li>
                    All the code of WHJSLS would be licensed under different Open Source license,
                    the common license are GNU General Public License version 3.0,
                    Apache License 2.0 or the MIT License.
                    For detail of every part of code, please refer to its own Github repositories,
                    the license would be in LICENSE or LICENSE.md file.
                </li>
            </ol>
        </div>
        <div class="pull-left">
            <small>Last Updated: 24 Sept, 2015</small>
        </div>
    </div>
@stop