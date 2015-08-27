!function ($, React, Bootstrap) {
    var bug = '/api/' + window.location.pathname;
    var TabLabel = Bootstrap.TabLabel;
    var Issue = React.createClass({
        render: function() {
            var content = markdown.toHTML(this.props.detail);
            var status = this.props.status.charAt(0).toUpperCase() + this.props.status.substr(1);
            return (
                <div className="container">
                    <h2>
                        {this.props.title}
                        <TabLabel level={this.props.level}>
                            {this.props.level}
                        </TabLabel>
                    </h2>
                    <span className="lead">{ status }</span>
                    <span className="help-block">{ this.props.updated }</span>
                    <div className="container" dangerouslySetInnerHTML={{ __html: content}} />
                </div>
            );
        }
    });
    $.getJSON(bug, function(result){
        console.log('');
        React.render(
            <Issue
                title={result.title}
                updated={result.update_at}
                detail={result.detail}
                level={result.level}
                status={result.status}
                />,
            document.getElementById('wrap')
        );
        UI.label();
    });
}(jQuery, React, Bootstrap);