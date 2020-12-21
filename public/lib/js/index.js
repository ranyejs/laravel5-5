$(function(){
    $(".p1_right_list li:nth-child(1)").click(function(){
        $(".p1_pic").fadeIn(200);
        $(".p1_right_list").fadeOut(200)
    })



    let index; 
    $(".p1_pic_middle").on("click",".p1_pic_p",function(){ 
        // alert(1)
        index=$(this).index()
        tag = index+1;

        $(this).addClass("on2").siblings().removeClass("on2");
        $(this).parent().parent().parent().find('.p1_pic_phone').find(".p1_pic_xz").html('')
        let html1=''
        if(index==3){
            index=1
        }
        for (let i = 0; i < index+1; i++) {
            html1+='<div class="img_pic'+i+'">'
            html1+='<img src="images/j1.png" class="p1_pic_tp" alt="">'
            html1+='<input type="file" class="p1_file" name="file" accept="image/*"  onchange="previewImg(this,$(this))" >'
            html1+='<div class="p1_pic_cha"><img src="images/cha.png" alt=""></div>'
            html1+='</div>'
        }  
        $(this).parent().parent().parent().find('.p1_pic_phone').find(".p1_pic_xz").append(html1)
    })
    //增加相片组
    let html2=''
    $(".p1_pic_btn").click(function(){
        html2+='<div class="p1_pic_t1">' 
        html2+='<div class="p1_pic_xq">'
        html2+='<p class="p1_pic_01">* 选择详情页照片组:</p>'
        html2+='<div class="p1_pic_02"><p class="p1_pic_p on2">1张</p><p class="p1_pic_p">2张</p><p class="p1_pic_p">3张</p><p class="p1_pic_p">2张（竖图）</p></div> '
        html2+='</div>'
        html2+='<div class="p1_pic_phone">'
        html2+='<p>上传相片</p>'
        html2+='<div class="p1_pic_xz"><divclass="img_pic0"><img src="images/j1.png" class="p1_pic_tp" alt=""><input type="file" class="p1_file" name="file" accept="image/*"  onchange="previewImg(this,$(this))" ><div class="p1_pic_cha"><img src="images/cha.png" alt=""></div></div></div>'
        html2+='</div>'
        html2+='</div>'
        $(".p1_pic_middle").append(html2)
        html2='' 
    }) 

    //关闭
    $(".p1_pic_middle").on("click",".p1_pic_cha",function(){ 
        //$(this).fadeOut(200);
        $(this).parent().find('.p1_pic_tp').attr("src","images/j1.png")
    })


    $("body").on("click",".p1_left_sc",function(){ 
     $(this).parent().parent().parent().remove()

    })
    
    $(".p1_left_bj").click(function(){
        $(".p1_right_list").fadeOut(200);
        $(".p1_pic").fadeIn(200);
    })
 
})

 
    
function previewImg(input, imgObj) {
   

	var maxsize = 300 * 1024; //超过300k进行压缩
	//是否支持
	if(typeof FileReader === 'undefined') {
		alert("抱歉，你的浏览器不支持 FileReader，请使用现代浏览器操作！");
		input.setAttribute('disabled', 'disabled');
	}
	if(input.files && input.files[0]) {
		var file = input.files[0],
			reader = new FileReader();
		if(file.type !== 'image/jpeg' && file.type !== 'image/png' && file.type !== 'image/gif') {
			alert('不是有效的图片文件!');
			return;
		}
		var filemaxsize = 1024 * 3; //接受的文件最大1M
		var size = file.size / 1024;
		console.log(size, filemaxsize)
		if(size > filemaxsize) {
            alert("上传图片不能大于3M")
			return;
		}
		reader.readAsDataURL(file);
		reader.onload =function(e){
            var result = this.result; //获取到base64的图片  
            imgObj.parent().find('img').eq(0).attr("src",$(this)[0].result);  
		}
    }
    
     
}