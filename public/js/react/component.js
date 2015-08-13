!function(React) {
    var Container = React.createClass({displayName: "Container",
        render: function() {
            return (
                React.createElement("div", {className: "Container"}, 
                    this.props.children
                )
            )
        }
    });
    var Button = React.createClass({displayName: "Button",
        propTypes: {
            active: React.PropTypes.bool
        },
        render: function () {
            this.props["class"] = this.props["class"] || '';
            this.props["class"] += ' btn';
            if (this.props.active)
                this.props["class"] += ' active';
            return (
                React.createElement("button", {type: "button", className: this.props["class"]}, 
                    this.props.children
                )
            );
        }
    });

    var Table = React.createClass({displayName: "Table",
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
                React.createElement("table", {className: classes}
                )
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

