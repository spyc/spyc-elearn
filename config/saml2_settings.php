<?php

//This is variable is an example - Just make sure that the urls in the 'idp' config are ok.
$idp_host = 'https://www.pyc.edu.hk/simplesaml';

return $settings = [
    /*****
     * Cosmetic settings - controller routes
     **/
    'useRoutes' => true, //include library routes and controllers


    'routesPrefix' => '/sso',

    /**
     * Where to redirect after logout
     */
    'logoutRoute' => '/',

    /**
     * Where to redirect after login if no other option was provided
     */
    'loginRoute' => '/',


    /**
     * Where to redirect after login if no other option was provided
     */
    'errorRoute' => '/',




    /*****
     * One Loign Settings
     */



    // If 'strict' is True, then the PHP Toolkit will reject unsigned
    // or unencrypted messages if it expects them signed or encrypted
    // Also will reject the messages if not strictly follow the SAML
    // standard: Destination, NameId, Conditions ... are validated too.
    'strict' => true, //@todo: make this depend on laravel config

    // Enable debug mode (to print errors)
    'debug' => false, //@todo: make this depend on laravel config

    // Service Provider Data that we are deploying
    'sp' => array(

        // Specifies constraints on the name identifier to be used to
        // represent the requested subject.
        // Take a look on lib/Saml2/Constants.php to see the NameIdFormat supported
        'NameIDFormat' => 'urn:oasis:names:tc:SAML:2.0:nameid-format:persistent',

        // Usually x509cert and privateKey of the SP are provided by files placed at
        // the certs folder. But we can also provide them with the following parameters
        'x509cert' => file_get_contents(base_path('cert/sp.crt')),
        'privateKey' => file_get_contents(base_path('cert/sp.key')),

        //LARAVEL - You don't need to change anything else on the sp
        // Identifier of the SP entity  (must be a URI)
        'entityId' => '', //LARAVEL: This would be set to saml_metadata route
        // Specifies info about where and how the <AuthnResponse> message MUST be
        // returned to the requester, in this case our SP.
        'assertionConsumerService' => array(
            // URL Location where the <Response> from the IdP will be returned
            'url' => '', //LARAVEL: This would be set to saml_acs route
            // SAML protocol binding to be used when returning the <Response>
            // message.  Onelogin Toolkit supports for this endpoint the
            // HTTP-Redirect binding only
            'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
        ),
        // Specifies info about where and how the <Logout Response> message MUST be
        // returned to the requester, in this case our SP.
        'singleLogoutService' => array(
            // URL Location where the <Response> from the IdP will be returned
            'url' => '', //LARAVEL: This would be set to saml_sls route
            // SAML protocol binding to be used when returning the <Response>
            // message.  Onelogin Toolkit supports for this endpoint the
            // HTTP-Redirect binding only
            'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
        ),
    ),

    // Identity Provider Data that we want connect with our SP
    'idp' => array(
        // Identifier of the IdP entity  (must be a URI)
        'entityId' => $idp_host . '/saml2/idp/metadata.php',
        // SSO endpoint info of the IdP. (Authentication Request protocol)
        'singleSignOnService' => array(
            // URL Target of the IdP where the SP will send the Authentication Request Message
            'url' => $idp_host . '/saml2/idp/SSOService.php',
            // SAML protocol binding to be used when returning the <Response>
            // message.  Onelogin Toolkit supports for this endpoint the
            // HTTP-POST binding only
            'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
        ),
        // SLO endpoint info of the IdP.
        'singleLogoutService' => array(
            // URL Location of the IdP where the SP will send the SLO Request
            'url' => $idp_host . '/saml2/idp/SingleLogoutService.php',
            // SAML protocol binding to be used when returning the <Response>
            // message.  Onelogin Toolkit supports for this endpoint the
            // HTTP-Redirect binding only
            'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
        ),
        // Public x509 certificate of the IdP
        'x509cert' => 'MIICFzCCAYACCQDKxWRBcrRH7zANBgkqhkiG9w0BAQUFADBQMQswCQYDVQQGEwJISzESMBAGA1UECAwJSG9uZyBLb25nMQswCQYDVQQHDAJISzEgMB4GA1UECgwXU2hhdGluIFB1aSBZaW5nIENvbGxlZ2UwHhcNMTQxMjA1MDgxMjM5WhcNNDIwNDIxMDgxMjM5WjBQMQswCQYDVQQGEwJISzESMBAGA1UECAwJSG9uZyBLb25nMQswCQYDVQQHDAJISzEgMB4GA1UECgwXU2hhdGluIFB1aSBZaW5nIENvbGxlZ2UwgZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBALU6Ls3rskRyJD0Ys0m2zjUwMU7zRo31Flui/Utm0CqG3Lj0cA/rVs5MLClSqle8FgTYLsmngx3TmJuuvHYPZbCW+Xq6YyBXAdqr4I6hMcHhFtEijlMIe+J7bN41PMe5NT7vxuL6qVHE0dWpGv+rz8esyqjzCp1jELFXeYW+/E/LAgMBAAEwDQYJKoZIhvcNAQEFBQADgYEAVRmIg2wm2H8+N/qyEB9OPFzNB2ycyu86pvf90Riem2iapN8qxVumbn0JBxOOS7rtePBHcdvMAmUbMgrazQada7PU87ggpzaEmYRwuMG5GulyVIgYSN2n7CGIZAJ9YYuwawirgPXzTdqgXtC8e2ud0ymavBRgMqV2KKJi1eZXF28='
        /*
         *  Instead of use the whole x509cert you can use a fingerprint
         *  (openssl x509 -noout -fingerprint -in "idp.crt" to generate it)
         */
        // 'certFingerprint' => '',
    ),



    /***
     *
     *  OneLogin advanced settings
     *
     *
     */
    // Security settings
    'security' => array(

        /** signatures and encryptions offered */

        // Indicates that the nameID of the <samlp:logoutRequest> sent by this SP
        // will be encrypted.
        'nameIdEncrypted' => false,

        // Indicates whether the <samlp:AuthnRequest> messages sent by this SP
        // will be signed.              [The Metadata of the SP will offer this info]
        'authnRequestsSigned' => false,

        // Indicates whether the <samlp:logoutRequest> messages sent by this SP
        // will be signed.
        'logoutRequestSigned' => false,

        // Indicates whether the <samlp:logoutResponse> messages sent by this SP
        // will be signed.
        'logoutResponseSigned' => false,

        /* Sign the Metadata
         False || True (use sp certs) || array (
                                                    keyFileName => 'metadata.key',
                                                    certFileName => 'metadata.crt'
                                                )
        */
        'signMetadata' => false,


        /** signatures and encryptions required **/

        // Indicates a requirement for the <samlp:Response>, <samlp:LogoutRequest> and
        // <samlp:LogoutResponse> elements received by this SP to be signed.
        'wantMessagesSigned' => false,

        // Indicates a requirement for the <saml:Assertion> elements received by
        // this SP to be signed.        [The Metadata of the SP will offer this info]
        'wantAssertionsSigned' => true,

        // Indicates a requirement for the NameID received by
        // this SP to be encrypted.
        'wantNameIdEncrypted' => false,

        'wantAssertionsEncrypted' => true,

        // Authentication context.
        // Set to false and no AuthContext will be sent in the AuthNRequest,
        // Set true or don't present thi parameter and you will get an AuthContext 'exact' 'urn:oasis:names:tc:SAML:2.0:ac:classes:PasswordProtectedTransport'
        // Set an array with the possible auth context values: array ('urn:oasis:names:tc:SAML:2.0:ac:classes:Password', 'urn:oasis:names:tc:SAML:2.0:ac:classes:X509'),
        'requestedAuthnContext' => true,
    ),

    // Contact information template, it is recommended to suply a technical and support contacts
    'contactPerson' => array(
        'technical' => array(
            'givenName' => 'Tony Yip',
            'emailAddress' => 'pyc10169@pyc.edu.hk'
        ),
        'support' => array(
            'givenName' => 'Shatin Pui Ying College',
            'emailAddress' => 'info@pyc.edu.hk'
        ),
    ),

    // Organization information template, the info in en_US lang is recomended, add more if required
    'organization' => array(
        'en-GB' => array(
            'name' => 'elearn',
            'displayname' => 'SPYC Elearn',
            'url' => 'http://elearn.pyc.edu.hk'
        ),
    ),

/* Interoperable SAML 2.0 Web Browser SSO Profile [saml2int]   http://saml2int.org/profile/current

   'authnRequestsSigned' => false,    // SP SHOULD NOT sign the <samlp:AuthnRequest>,
                                      // MUST NOT assume that the IdP validates the sign
   'wantAssertionsSigned' => true,
   'wantAssertionsEncrypted' => true, // MUST be enabled if SSL/HTTPs is disabled
   'wantNameIdEncrypted' => false,
*/

];
