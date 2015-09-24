!function(React, Bootstrap){
    var
        CreativeCommons = Bootstrap.CreativeCommons,
        Copyright = React.createClass({
            propTypes: {
                license: React.PropTypes.oneOf(['restrict', 'cc-hk', 'cc-international'])
            },
            getDefaultProps: function() {
                return {
                    license: 'cc-hk'
                };
            },
            render: function() {
                switch (this.props.license) {
                    case 'restrict':
                        var year = (new Date()).getFullYear();
                        return (
                            <div>&copy; Shatin Pui Ying College {year}</div>
                        );
                    case 'cc-hk':
                        return (
                            <CreativeCommons
                                className={this.props.className}
                                license="by-sa/3.0/hk/"
                                name="Creative Commons Attribution-ShareAlike 3.0 Hong Kong License"
                                />
                        );
                    case 'cc-international':
                        return (
                            <CreativeCommons
                                className={this.props.className}
                                license="by-nc-sa/4.0/"
                                name="Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License"
                                />
                        );
                }
            }
        }),
        Footer = React.createClass({
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
                                <Copyright className="col-md-6" />
                                <nav className="col-md-6">
                                    <ul className="pull-right bottom-menu list-inline">
                                        <li><a href="/policy">Policy</a></li>
                                        <li><a href="/terms">Terms</a></li>
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