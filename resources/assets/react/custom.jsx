!function(React, Bootstrap){
    var Footer = React.createClass({
        render: function() {
            return (
                <footer className="container">
                    <div id="bottom">
                        <div className="container">
                            <div className="row">
                                <div className="col-md-3 widget">
                                    <h2 className="widget-title">Reporting</h2>
                                    <div className="text-widget">
                                        <p><a href="/bug">Report Issue</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="bottom-nav">
                        <div className="container">
                            <div className="row">
                                <div className="col-md-6">
                                    <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/hk/">
                                        <img alt="Creative Commons Licence" style={{ 'borderWidth': 0}} src="https://licensebuttons.net/l/by-sa/3.0/hk/88x31.png" />
                                    </a>
                                    &emsp;This work is licensed under a&nbsp;
                                    <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/hk/">
                                        Creative Commons Attribution-ShareAlike 3.0 Hong Kong License
                                    </a>.
                                    Logos and trademarks belong to their respective owners.
                                </div>
                                <nav className="col-md-6">
                                    <ul className="pull-right bottom-menu list-inline">
                                        <li><a href="/policy">Policy</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </footer>
            )
        }
    });

    React.render(
        <Footer />,
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