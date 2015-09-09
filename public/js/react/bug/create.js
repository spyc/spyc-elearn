!function ($, React, Bootstrap) {
    var Markdown = Bootstrap. MarkdownTextarea;
    var FormGroup = Bootstrap.FormGroup;
    var IssueCreateForm = React.createClass({displayName: "IssueCreateForm",
        componentDidMount: function() {
            this.setState({
                token: document.getElementById('token').innerHTML
            });
        },
        render: function() {
            var token = this.state.token || '';
            return (
                React.createElement("form", {method: "post", action: "/bug", className: "form-horizontal"}, 
                    React.createElement("input", {type: "hidden", name: "_token", refs: "token", value: token})
                )
            );
        }
    });

    React.render(
        React.createElement(IssueCreateForm, null),
        document.getElementById('form')
    )
}(window.jQuery, window.React, window.Bootstrap);

