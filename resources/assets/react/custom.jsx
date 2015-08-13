!function(React, Bootstrap){
    var Footer = React.createClass({
        render: function() {
            return (
                <footer className="container">
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
            )
        }
    });

    React.render(
        <Footer />,
        document.getElementsByTagName('footer')[0]
    );
}(window.React, window.Bootstrap);
