
/**
 * 
 * 파일 업로드 js 파일
 * 
 * @file : file_upload.js
 * @author : ParkSeongHyun
 * @since : 2020-10-04
 * @desc : 파일업로드 관련 자바스크립트 파일
 * 
 */

 /**
  * 
  * 파일업로드 함수
  * 
  * @param : * f 
  * @return : true
  * @exception 
  */
function formSubmit(f) {

    // 업로드 할 수 있는 파일 확장자를 제한합니다.
	var extArray = new Array('hwp','xls','doc','xlsx','docx','pdf','jpg','jpeg','gif','png','txt','ppt','pptx');

	var path = document.getElementById("upfile").value;

    if(path == "") 
    {
		alert("파일을 선택해 주세요.");
		return false;
    }
    
	var pos = path.indexOf(".");
    //위에서 선언한 확장자 체크 선언한 확장자가 없으면 return false
    if(pos < 0) 
    {
		alert("확장자가 없는파일 입니다.");
		return false;
	}


	var ext = path.slice(path.indexOf(".") + 1).toLowerCase();
	var checkExt = false;

    for(var i = 0; i < extArray.length; i++) 
    {
        if(ext == extArray[i]) 
        {
			checkExt = true;
			break;
		}
	}

	if(checkExt == false) {
		alert("업로드 할 수 없는 파일 확장자 입니다.");
	    return false;

	}

	return true;

}
