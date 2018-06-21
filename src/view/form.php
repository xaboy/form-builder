<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$form->getTitle()?></title>
	<?=$form->getScript()?>
	<?=$form->getSuccessScript()?>
	<script>
	</script>
</head>
<body>
<div id="app">
</div>
<script>
	(function () {

	    var getRule = function () {
            var rule = <?=json_encode($rule)?>;
            rule.forEach(function (component) {
	             if(component.type == 'cascader'){
	                 if(component.props.type == 'city'){
                         component.props.data = window.province;
	                 }else if(component.props.type == 'city_area'){
                         component.props.data = window.province;
	                 }

	             }
            });
            return rule;
        };

        var vm = new Vue({
            el:'#app',
            data:{
            },
            mounted:function(){
                var root = document.getElementById('app'),that = this;
                $f = this.$formCreate(
                    //根据mock参数动态生成form表单
                    getRule(),
                    //form表单全局配置
                    {
                        el:root,
                        form:{
                            inline:<?=$form->getConfig('inline',false)?'true':'false'?>,
                            //表单域标签的位置，可选值为 left、right、top
                            labelPosition:'<?=$form->getConfig('labelPosition','right')?>',
                            //表单域标签的宽度，所有的 FormItem 都会继承 Form 组件的 label-width 的值
                            labelWidth:<?=(float)$form->getConfig('labelWidth',125)?>,
                            //是否显示校验错误信息
                            showMessage:<?=$form->getConfig('showMessage',true)?'true':'false'?>,
                            //原生的 autocomplete 属性，可选值为 off 或 on
                            autocomplete:'<?=$form->getConfig('showMessage','off')?>'
                        },
                        upload:{
                            onExceededSize:function (file) {
                                vm.$Message.error(file.name + '超出指定大小限制');
                            },
                            onFormatError:function () {
                                vm.$Message.error(file.name + '格式验证失败');
                            },
                            onError:function (error) {
                                vm.$Message.error(file.name + '上传失败,('+ error +')');
                            },
                            onSuccess:function (res) {
                                if(res.code == 200){
                                    return res.data.filePath;
                                }else{
                                    vm.$Message.error(res.msg);
                                }
                            }
                        },
                        //表单提交事件
                        onSubmit: function (formData) {
                            $f.submitStatus({loading: true});
                            $.ajax({
								url:'<?=$form->getAction()?>',
	                            type:'<?=$form->getMethod()?>',
	                            dataType:'json',
	                            data:formData,
	                            success:function (res) {
									if(res.code == 200){
                                        that.$Message.success(res.msg);
                                        formCreate.formSuccess && formCreate.formSuccess(res,$f);
                                        //TODO 表单提交成功!
									}else{
                                        that.$Message.error(res.msg);
                                        $f.btn.finish();
									}
                                },
	                            error:function () {
		                            that.$Message.error('表单提交失败');
		                            $f.btn.finish();
                                }
                            });
                        }
                    });
            }
        });
    })();
</script>
</body>
</html>