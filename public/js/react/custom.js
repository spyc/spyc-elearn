!function(React, Bootstrap){
    var Footer = React.createClass({displayName: "Footer",
        render: function() {
            return (
                React.createElement("footer", {className: "container"}, 
                    React.createElement("div", {id: "bottom"}, 
                        React.createElement("div", {className: "container"}, 
                            React.createElement("div", {className: "row"}, 
                                React.createElement("div", {className: "col-md-3 widget"}, 
                                    React.createElement("h2", {className: "widget-title"}, "Reporting"), 
                                    React.createElement("div", {className: "text-widget"}, 
                                        React.createElement("p", null, React.createElement("a", {href: "/bug"}, "Report Issue"))
                                    )
                                )
                            )
                        )
                    ), 
                    React.createElement("div", {id: "bottom-nav"}, 
                        React.createElement("div", {className: "container"}, 
                            React.createElement("div", {className: "row"}, 
                                React.createElement("div", {className: "col-md-6"}, 
                                    React.createElement("a", {rel: "license", href: "http://creativecommons.org/licenses/by-sa/3.0/hk/"}, 
                                        React.createElement("img", {alt: "Creative Commons Licence", style: { 'borderWidth': 0}, src: "https://licensebuttons.net/l/by-sa/3.0/hk/88x31.png"})
                                    ), 
                                    " This work is licensed under a ", 
                                    React.createElement("a", {rel: "license", href: "http://creativecommons.org/licenses/by-sa/3.0/hk/"}, 
                                        "Creative Commons Attribution-ShareAlike 3.0 Hong Kong License"
                                    ), "." + ' ' +
                                    "Logos and trademarks belong to their respective owners."
                                ), 
                                React.createElement("nav", {className: "col-md-6"}, 
                                    React.createElement("ul", {className: "pull-right bottom-menu list-inline"}, 
                                        React.createElement("li", null, React.createElement("a", {href: "/policy"}, "Policy"))
                                    )
                                )
                            )
                        )
                    )
                )
            )
        }
    });

    React.render(
        React.createElement(Footer, null),
        document.getElementById('footer')
    );
}(window.React, window.Bootstrap);
/**
<hr />
<a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/hk/">
    <img alt="Creative Commons Licence" style={{ 'borderWidth': 0}} src="https://licensebuttons.net/l/by-sa/3.0/hk/88x31.png" />
    </a>
    This work is licensed under a&nbsp;
<a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/hk/">
    Creative Commons Attribution-ShareAlike 3.0 Hong Kong License
</a>.
    Logos and trademarks belong to their respective owners.
</footer>
*/