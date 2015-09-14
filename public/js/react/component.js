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
            this.props.class = this.props.class || '';
            this.props.class += ' btn';
            if (this.props.active)
                this.props.class += ' active';
            return (
                React.createElement("button", {type: "button", className: this.props.class}, 
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

    var MarkdownTextarea = React.createClass({displayName: "MarkdownTextarea",
        generatePreview: function() {
            var content = this.refs.markdownTextarea.getDOMNode().value;
            this.setState({
                preview: Markdown.toHTML(content)
            });
        },
        render: function() {
            var classes = this.props.className || '';
            return(
                React.createElement("div", {className: classes}, 
                    React.createElement("ul", {className: "nav nav-tabs", role: "tablist"}, 
                        React.createElement("li", {role: "presentation", class: "active"}, 
                            React.createElement("a", {href: "#edit", "aria-controls": "edit", "aria-expanded": "true", role: "tab", "data-toggle": "tab"}, 
                                "Write"
                            )
                        ), 
                        React.createElement("li", {role: "presentation"}, 
                            React.createElement("a", {href: "#preview", "aria-controls": "preview", "aria-expanded": "true", role: "tab", "data-toggle": "tab"}, 
                                "Preview"
                            )
                        )
                    ), 
                    React.createElement("div", {className: "tab-content"}, 
                        React.createElement("div", {role: "tabpanel", className: "tab-pane active", id: "edit"}, 
                            React.createElement("textarea", {name: this.props.name, ref: "markdownTextarea", className: "form-control"})
                        ), 
                        React.createElement("div", {role: "tabpanel", className: "tab-pane", id: "preview"}, 
                            this.state.preview
                        )
                    )
                )
            );
        }
    });

    var FormGroup = React.createClass({displayName: "FormGroup",
        propTypes: {
            type: React.PropTypes.string,
            name: React.PropTypes.string,
            label: React.PropTypes.string,
            required: React.PropTypes.bool,
            autofocus: React.PropTypes.bool
        },
        getDefaultProps: function() {
            return {
                required: true,
                autofocus: false
            }
        },
        render: function() {
            return (
                React.createElement("div", {className: "form-group"}, 
                    React.createElement("label", {for: this.props.name, className: "col-sm-2 control-label"}, 
                        this.props.label
                    ), 
                    React.createElement("div", {className: "col-sm-8"}, 
                        React.createElement("input", {type: this.props.type, id: this.props.name, name: this.props.name, placeholder: this.props.label, required: this.props.required, autofocus: this.props.autofocus})
                    )
                )
            );
        }
    });

    var TabLabel = React.createClass({displayName: "TabLabel",
        render: function() {
            return (
                React.createElement("span", {className: "tag-label", "data-level":  this.props.level}, 
                        this.props.children
                )
            );
        }
    });

    var Bootstrap = {
        Table: Table,
        Button: Button,
        Container: Container,
        MarkdownTextarea: MarkdownTextarea,
        FormGroup: FormGroup,
        TabLabel
    };
    window.Bootstrap = Bootstrap;
}(window.React);

