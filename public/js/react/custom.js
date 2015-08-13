!function(React, Bootstrap){
    var Footer = React.createClass({displayName: "Footer",
        render: function() {
            return (
                React.createElement("footer", {className: "container"}, 
                    React.createElement("hr", null), 
                    React.createElement("a", {rel: "license", href: "http://creativecommons.org/licenses/by-sa/3.0/hk/"}, 
                        React.createElement("img", {alt: "Creative Commons Licence", style: { 'borderWidth': 0}, src: "https://licensebuttons.net/l/by-sa/3.0/hk/88x31.png"})
                    ), 
                    "This work is licensed under a ", 
                    React.createElement("a", {rel: "license", href: "http://creativecommons.org/licenses/by-sa/3.0/hk/"}, 
                        "Creative Commons Attribution-ShareAlike 3.0 Hong Kong License"
                    ), "." + ' ' +
                    "Logos and trademarks belong to their respective owners."
                )
            )
        }
    });

    React.render(
        React.createElement(Footer, null),
        document.getElementsByTagName('footer')[0]
    );
}(window.React, window.Bootstrap);
