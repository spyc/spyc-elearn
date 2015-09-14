!function ($, React, Bootstrap) {
    var Markdown = Bootstrap. MarkdownTextarea;
    var FormGroup = Bootstrap.FormGroup;
    var IssueCreateForm = React.createClass({
        componentDidMount: function() {
            this.setState({
                token: document.getElementById('token').innerHTML
            });
        },
        render: function() {
            var token = this.state.token || '';
            return (
                <form method="post" action="/bug" className="form-horizontal">
                    <input type="hidden" name="_token" refs="token" value={token} />
                </form>
            );
        }
    });

    React.render(
        <IssueCreateForm />,
        document.getElementById('form')
    )
}(window.jQuery, window.React, window.Bootstrap);

