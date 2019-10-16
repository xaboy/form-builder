(function () {

    var isType = function (data, type) {
        return Object.prototype.toString.call(data) === ('[object ' + type + ']');
    };

    var parseRule = function (rule) {
        rule.forEach(function (c) {
            var type = c.type ? ('' + c.type).toLocaleLowerCase() : '',
                children = isType(rule.children, 'Array') ? rule.children : [];
            if ((type === 'cascader' || type === 'tree') && c.props) {
                if (c.props.data && isType(c.props.data, 'String') && c.props.data.indexOf('js.') === 0) {
                    c.props.data = window[c.props.data.substr(3)];
                }else if(c.props.options && isType(c.props.options, 'String') && c.props.options.indexOf('js.') === 0){
                    c.props.options = window[c.props.options.substr(3)];
                }
            }
            if (children.length) parseRule(children);
        });

        return rule;
    };

    var ajax = function(url, type, formData, callback){
        $.ajax({
            url: url,
            type: ('' + type).toLocaleUpperCase(),
            dataType: 'json',
            headers: headers,
            contentType: contentType,
            data: formData,
            success: function (res) {
                callback(1, res);
            },
            error: function () {
                callback(0);
            }
        });

    }

    var rule = parseRule(<?=$form->parseFormRule()?>), headers = <?=$form->parseHeaders()?>, config = <?=$form->parseFormConfig()?>, contentType = "<?=$form->getFormContentType()?>", action = "<?=$form->getAction()?>", method = "<?=$form->getMethod()?>", vm = new Vue();
    if (!vm.$Message && vm.$message) {
        Vue.prototype.$Message = vm.$message
    }
    return function (el, callback) {

        if (el) config.el = el;

        config.onSubmit = function (formData) {
            $f.submitBtnProps({loading: true, disabled: true});
            ajax(action, method, formData, function (status, res) {
                if (callback) return callback(status, res, $f);
                if (status && res.code === 200) {
                    $f.submitBtnProps({loading: false, disabled: false});
                    vm.$Message.success(res.msg || '表单提交成功');
                } else {
                    $f.submitBtnProps({loading: false, disabled: false});
                    vm.$Message.error(res.msg || '表单提交失败');
                }
            });
        };

        config.global = {
            upload: {
                props: {
                    onExceededSize: function (file) {
                        vm.$Message.error(file.name + '超出指定大小限制');
                    },
                    onFormatError: function () {
                        vm.$Message.error(file.name + '格式验证失败');
                    },
                    onError: function (error) {
                        vm.$Message.error(file.name + '上传失败,(' + error + ')');
                    },
                    onSuccess: function (res, file) {
                        if (res.code === 200) {
                            file.url = res.data.filePath;
                        } else {
                            vm.$Message.error(res.msg);
                        }
                    }
                }
            }
        };
        var $f = formCreate.create(rule, config);
        return $f;
    };
})();
