;var
    Container = React.createClass({
        render: function() {
            return (
                <div className="container">
                    {this.props.children}
                </div>
            )
        }
    }),
    Row = React.createClass({
        render: function () {
            return (
                <div className="row">
                    {this.props.children}
                </div>
            );
        }
    }),
    Button = React.createClass({
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
    }),
    Table = React.createClass({
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
    }),
    MarkdownTextarea = React.createClass({
        generatePreview: function() {
            var content = this.refs.markdownTextarea.getDOMNode().value;
            this.setState({
                preview: Markdown.toHTML(content)
            });
        },
        render: function() {
            var classes = this.props.className || '';
            return(
                <div className={classes}>
                    <ul className="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#edit" aria-controls="edit" aria-expanded="true" role="tab" data-toggle="tab">
                                Write
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#preview" aria-controls="preview" aria-expanded="true" role="tab" data-toggle="tab">
                                Preview
                            </a>
                        </li>
                    </ul>
                    <div className="tab-content">
                        <div role="tabpanel" className="tab-pane active" id="edit">
                            <textarea name={this.props.name} ref="markdownTextarea" className="form-control" />
                        </div>
                        <div role="tabpanel" className="tab-pane" id="preview">
                            {this.state.preview}
                        </div>
                    </div>
                </div>
            );
        }
    }),
    FormGroup = React.createClass({
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
                <div className="form-group">
                    <label for={this.props.name} className="col-sm-2 control-label">
                        {this.props.label}
                    </label>
                    <div className="col-sm-8">
                        <input type={this.props.type} id={this.props.name} name={this.props.name} placeholder={this.props.label} required={this.props.required} autofocus={this.props.autofocus} />
                    </div>
                </div>
            );
        }
    }),
    TabLabel = React.createClass({
        render: function() {
            return (
                <span className="tag-label" data-level={ this.props.level }>
                        {this.props.children}
                </span>
            );
        }
    }),
    CreativeCommons = React.createClass({
        propTypes: {
            license: React.PropTypes.string,
            name: React.PropTypes.string
        },
        render: function() {
            var
                url = 'http://creativecommons.org/licenses/' + this.props.license,
                image = 'https://licensebuttons.net/l/' + this.props.license + '88x31.png';
            return (
                <div className={this.props.className}>
                    <a rel="license" href={url}>
                        <img alt="Creative Commons Licence" style={{ 'borderWidth': 0}} src={image} />
                    </a>
                    <br />
                    This work is licensed under a <a rel="license" href={url}>{this.props.name}</a>.
                    <br />
                    Logos and trademarks belong to their respective owners.
                </div>
            );
        }
    }),
    FontAwesome = React.createClass({
        propTypes: {
            icon: React.PropTypes.string
        },
        render: function () {
            var className = this.props.className + ' fa fa-' + this.props.icon;
            return (
                <span className={className}>
                        {this.props.children}
                    </span>
            );
        }
    });