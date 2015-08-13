!function(React) {
    var Container = React.createClass({
        render: function() {
            return (
                <div className="Container">
                    {this.props.children}
                </div>
            )
        }
    });
    var Button = React.createClass({
        propTypes: {
            active: React.PropTypes.bool
        },
        render: function () {
            this.props.class = this.props.class || '';
            this.props.class += ' btn';
            if (this.props.active)
                this.props.class += ' active';
            return (
                <button type="button" className={this.props.class}>
                    {this.props.children}
                </button>
            );
        }
    });

    var Table = React.createClass({
        propTypes: {
            responsive: React.PropTypes.bool,
            striped: React.PropTypes.bool
        },
        getDefaultProps: function() {
            return {
                responsive: false,
                striped: false
            };
        },
        render: function() {
            var cx = React.addons.classSet;
            var classes = cx({
                'table': true,
                'table-responsive': this.props.responsive,
                'table-striped': this.props.striped
            });
            return (
                <table className={classes}>
                </table>
            );
        }
    });

    var Bootstrap = {
        Table: Table,
        Button: Button,
        Container: Container
    };
    window.Bootstrap = Bootstrap;
}(window.React);

