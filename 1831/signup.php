<!DOCTYPE html>
<html>
<head>
</head>
<script>
function blank_up(){
    var du = document.userinput;
    var chk1=document.userinput.check1.checked;
    var chk2=document.userinput.check2.checked;

    if(!chk1){
            alert('홈페이지 이용 약관에 동의해 주세요');
            return false;
    } 
    if(!chk2) {
            alert('개인정보 수집 및 이용에 동의해 주세요');
            return false;
    }
    
    if(!du.user_name.value){
        alert("이름을 입력하시오");
        du.user_name.focus();
        return false;
    }

    if(!du.user_id.value){
        alert("아이디를 입력하시오");
        du.user_id.focus();
        return false;
    }
   
    if(du.use.value == '0'){
        alert("아이디 중복을 확인해주세요.");
        du.user_id.focus();
        return false;
    }  

	if(!du.user_password.value){
        alert("비밀번호를 입력하시오");
        du.user_password.focus();
        return false;
    }
    
    if(du.user_password.value != du.pwch.value){
        alert("비밀번호확인을 입력해주세요.");
        du.pwch.focus();
        return false;
    }

	if(!du.user_phonenum.value){
        alert("전화번호를 입력하시오");
        du.user_phonenum.focus();
        return false;
    }

	if(!du.zonecode.value){
        alert("우편번호를 입력하시오");
        du.zonecode.focus();
        return false;
    }

    if(!du.address.value){
        alert("주소를 입력하시오");
        du.address.focus();
        return false;
    }

    if(!du.address_etc.value){
        alert("주소를 입력하시오");
        du.address_etc.focus();
        return false;
    }

	if(!du.user_email.value){
        alert("이메일을 입력하시오");
        du.user_email.focus();
        return false;
    }
}
</script>

<script>
	function possible(){
 
    var du = document.userinput;
        
    var id = du.user_id.value;
    
    if(!id){
        alert('아이디를 입력해주세요.');
        du.user_id.focus();
        return false;
    }
        
    var url = "checkid.php?user_id="+id; 
    
    window.open(url,'','width=450,height=300,left=500');
    }
	</script>

<script>
	function mail(){
 
    var du = document.userinput;
        
    var emailc = du.user_email.value;
    
    if(!emailc){
        alert('이메일을 입력해주세요.');
        du.user_email.focus();
        return false;
    }
        
    var url = "signup_check_mail.php?user_email="+emailc; 
    
    window.open(url,'','width=450,height=300,left=500');
    }
	</script>

	<script>
	function check_pw(val){
    
    var du = document.userinput;
    var ogpw = du.user_password.value;
    var same = "<span style='color:green;'>비밀번호가 일치합니다.</span>";
    var diff = "<span style='color:red;'>비밀번호가 일치하지 않습니다.</span>";
    
    if(ogpw == val){
        document.getElementById("check").innerHTML = same;
    }else if(ogpw != val){
        document.getElementById("check").innerHTML = diff;
    }      
     }
	 </script>
<script type="text/JavaScript" src="http://code.jquery.com/jquery-1.7.min.js"></script>

    <script type="text/JavaScript" src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>

    <script type="text/javascript">

        function openDaumZipAddress() {

            new daum.Postcode({

                oncomplete:function(data) {

                    jQuery("#zonecode").val(data.zonecode);

                    jQuery("#address").val(data.address);

                    jQuery("#address_etc").focus();

                    console.log(data);

                }

            }).open();

        }

    </script>

<title></title>
<body bgcolor="#F3F3F3">

<center><div class="header-logo"><img src="jisoo.png" width="480px" height="250px"></div></center>

<form action="signupDo.php" method="post" name="userinput">

<center><div class="kboard-attr-row">
<b><label class="attr-name" style="font-size:20px; font-weight:bold;">홈페이지 이용 약관</label></b><p/>

<div style="overflow: scroll; width: 650px; height: 180px; padding: 10px; background-color: white;"> 
제1장 총칙<p/>
제1조 목적<br/> 
이 약관은 이지수 병원 그룹(이하 "회사"라 한다)에서 제공하는 인터넷 관련 서비스를 이용함에 있어 회원과 회사간의 권리, 의무 및 책임사항, 하나의 ID 및 PASSWORD로 통합하여 이용하는데 따른 이용조건 및 절차 등 기본적인 사항을 규정함을 목적으로 합니다.<p/>
제2조 약관의 효력 및 변경<br/>
(1) 당 홈페이지는 이용자가 본 약관 내용에 동의하는 것을 조건으로 이용자에게 서비스를 제공할 것이며, 이용자가 본 약관의 내용에 동의하는 경우, 당 홈페이지의 서비스 제공 행위 및 이용자의 서비스 이용 행위는 본 약관이 우선적으로 적용될 것입니다.<br/>
(2) 이 약관의 내용은 서비스 화면에 게시하거나 기타의 방법으로 회원에게 공시하고, 이에 동의한 회원이 서비스에 가입함으로써 효력이 발생합니다. <br/>
(3) 회사는 필요하다고 인정되는 경우에는 약관의 규제에 관한 법률 및 기타 관련 법령에 위배되지 않는 범위 내에서 이 약관을 변경할 수 있으며, 변경된 약관은 적용일자 및 개정사유를 명시하여 전항과 같은 방법으로 공지 또는 통보함으로써 효력을 발생합니다.<br/>
(4) 회사가 제3항에 따라 변경 약관을 공지 또는 통지하면서, 회원이 약관 변경 적용일까지 명시적으로 약관 변경에 대한 거부의사를 표시하지 아니하면, 회원이 변경 약관에 동의한 것으로 간주합니다. 회원은 변경된 약관 사항에 동의하지 않으면 서비스 이용을 중단(회원탈퇴)하고 이용계약을 해지할 수 있습니다.<p/>
제3조 약관 외 준칙<br/>
이 약관에 명시되지 않은 사항에 대해서는 전기통신기본법, 전기통신사업법 등 관계법령 및 회사가 정한 서비스의 세부이용지침 등의 규정에 의합니다.<p/>
제4조 용어정의<br/> 
(1) 이 약관에서 사용하는 용어의 정의는 다음과 같습니다.<br/>
① 이지수병원 그룹 :  건강증진센터, 응급의료센터 등을 말합니다.<p/>
이지수병원<br/>
주소 성남시 수정구 양지동 611(양지로27번길 1)<br/>
병원장 이율리<br/>
대표이사 이지수<p/>
② 사이트: 회사가 컴퓨터 등 정보통신 설비를 이용하여 제공할 수 있도록 설정한 가상의 공간을 말합니다. <br/>
③ 서비스: 회사의 홈페이지 및 "회사"가 운영하는 인터넷사이트 등에서 제공하는 인터넷상의 모든 서비스를 말합니다. <br/>
④ 회원(이용자): 본 약관에 동의하고, 인터넷 홈페이지에 로그인하여 본 약관에 따라 회사가 제공하는 서비스를 받는 자를 말합니다. <br/>
⑤ 비회원: 회원에 가입하지 않고 회사에서 제공하는 서비스를 이용하는 자를 말합니다.<br/>
⑥ 운영자: 서비스의 전반적인 관리와 원활한 운영을 위하여 회사에서 선정한 사람을 말합니다.<br/> 
⑦ ID: 회원이 서비스에 제공받기 위하여 본 사이트로 접속할 수 있는 로그인 명을 의미합니다.<br/>
⑧ 비밀번호: 회원의 비밀보호 및 회원 본인임을 확인하고 서비스에 제공되는 각종 정보의 보안을 위해 회원 자신이 설정하며 회사가 승인하는 영문, 숫자, 영문과 숫자의 혼합 등으로 5자에서 15자 사이로 표기한 암호문자를 말합니다. <br/>
⑨ 개인정보: 당해 정보에 포함되어 있는 성명, 주민등록번호 등의 사항을 통해 특정 개인을 식별할 수 있는 정보를 말합니다. <br/>
(2) 이 약관에서 사용하는 용어의 정의는 제1항에서 정하는 것을 제외하고는 관계 법령 및 서비스별 안내에서 정하는 바에 의합니다.<p/>
제2장 서비스 제공 및 이용<p/>
제5조 이용 계약의 성립<br/> 
(1) "위의 이용약관에 동의하십니까?"라는 이용 신청시의 물음에 고객이 "동의" 버튼을 누르면 약관에 동의하는 것으로 간주됩니다.<br/>
(2) 본 약관에 동의한 이용자는 회사가 요구하는 방법에 의해 본인확인 절차를 거치며, 만14세 미만의 경우는 법정대리인의 동의가 수반되어야 합니다.<br/>
(3) 이용 계약은 고객의 이용 신청에 대하여 회사가 승낙함으로써 성립합니다. 이용자는 회사가 승낙한 때로부터 회원의 자격을 취득합니다.<br/>
(4) 회사는 다음 각 호에 해당하는 신청에 대하여는 승낙을 하지 않을 수 있습니다.<br/>
① 기술상 서비스 제공이 불가능한 경우 <br/>
② 실명이 아니거나, 다른 사람의 명의사용 등 이용자 등록 시 허위로 신청하는 경우<br/>
③ 이용자 등록 사항을 누락하거나 오기하여 신청하는 경우<br/>
④ 기타 회사가 정한 이용신청 요건이 만족되지 않았을 경우<br/>
(5) 회원은 본인의 신상관련 사항이 변경되었을 때, 아래 각 호의 방법을 이용합니다.<br/>
① 인터넷으로 변경하는 경우: 홈페이지 로그인 후 회원정보수정에서 수정합니다.<br/>
② 병원방문으로 변경하는 경우 : 접수 및 진료안내 창구에서 수정합니다.<br/> 
③ 전화상담으로 변경하는 경우 : 이지수병원 대표번호 031)2819-8111  을 통해 수정합니다.<br/> 
(6) 회원은 한번 가입으로 회사의 통합 홈페이지의 모든 사이트에 회원가입을 하게 됩니다.<p/>
제6조 서비스의 내용 및 변경 <br/>
(1) 회사는 다음의 서비스를 제공합니다.<br/>
① 병원에서 제공하는 의료진 소개 및 진료일정 안내 서비스<br/> 
② 각종 예약 관련 서비스<br/> 
③ 회사에서 제공하는 각종 증명서 발급 서비스<br/> 
④ 회사에서 제공하는 모든 건강상담 서비스<br/> 
⑤ 전문 의료진이 제공하는 건강정보<br/> 
⑥ 기타 일반 안내 및 회사가 정하는 서비스<br/> 
(2) 회사는 불가피한 사정이 있는 경우 제공하는 서비스의 내용을 변경할 수 있으며, 이 경우 변경된 서비스의 내용 및 제공일자를 명시하여 서비스 화면에 공지하거나 기타의 방법으로 회원에게 통보합니다.<br/> 
(3) 회원이 서비스 이용 중 필요하다고 인정되는 다양한 정보에 대해 전자메일이나 서신우편 등의 방법으로 회원에게 제공할 수 있으며, 회원이 원하지 않을 경우 가입신청 메뉴와 회원정보수정 메뉴에서 정보수신거부를 할 수 있습니다.<br/> 
(4) 회사는 서비스 내용의 변경으로 인하여 이용자가 입은 손해에 대하여 배상하지 아니합니다. 단, 회사의 고의 또는 중과실이 있는 경우는 제외됩니다.<p/> 
제7조 서비스 이용개시 <br/>
(1) 회사는 회원의 이용신청을 승낙한 때부터 서비스를 개시합니다. 단, 일부 서비스의 경우에는 지정된 일자부터 서비스를 개시합니다.<br/>
(2) 회사의 업무상 또는 기술상의 장애로 인하여 서비스를 개시하지 못하는 경우에는 사이트에 공시하거나 회원에게 이를 통지합니다.<p/> 
제8조 서비스 이용시간<br/> 
(1) 서비스의 이용은 연중무휴 1일 24시간을 원칙으로 합니다. 다만, 회사의 업무상이나 기술상의 이유로 서비스가 일시 중지될 수 있고, 또한 운영 상의 목적으로 회사가 정한 기간에는 서비스가 일시 중지될 수 있습니다. 이러한 경우 회사는 사전 또는 사후에 이를 공지합니다.<br/>
(2) 회사는 서비스를 일정범위로 분할하여 각 범위별로 이용 가능한 시간을 별도로 정할 수 있으며 이 경우 그 내용을 공지합니다.<p/>
제9조 서비스의 중단<br/> 
(1) 회사는 시스템 등 장치의 보수점검?교체 및 고장, 일시적 통신장애, 서비스 개발, 시스템 정기점검, 긴급조치, 회원이 회사의 영업활동을 방해하는 경우, 기타 천재지변, 국가비상사태 등 불가항력적 사유가 있는 경우 등 불가피한 사유에 의해 서비스 제공이 일정기간 동안 제한 또는 중단될 수 있습니다.<br/> 
(2) 회사는 제1항의 사유로 서비스 제공이 일시적으로 중단됨으로 인하여 이용자 또는 제3자가 입은 손해에 대하여는 배상하지 아니합니다. 단, 회사의 고의 또는 중과실이 있는 경우에는 그러하지 아니합니다.<p/> 
제10조 회원 탈퇴 및 자격의 상실<br/> 
(1) 회원은 회사에 언제든지 탈퇴를 요청할 수 있으며 회사는 즉시 회원탈퇴를 처리합니다.<br/> 단, 탈퇴의 요청은 인터넷으로 해야 하며, 개인정보보호를 위해 개인 확인 절차를 거친 후 탈퇴하게 됩니다. 탈퇴 후 아이디를 제외한 모든 정보는 삭제되며 진료회원의 경우 본원의 환자 관련 정보는 삭제되지 않고 저장됩니다.<br/> 
(2) 회원이 다음 각호의 사유에 해당하는 경우, 회사는 회원자격을 상실시킬 수 있습니다.<br/> 
① 회원가입 시, 허위 내용을 기입한 경우<br/> 
② 다른 사람의 서비스 이용을 방해하거나 그 정보를 도용하는 등 질서를 위협하는 경우<br/> 
③ 회사 사이트 내에 제공되는 정보를 변경하는 등 사이트 운영을 방해한 경우<br/> 
④ 회사 서비스를 통해 얻은 정보를 회원의 개인적인 이용 외에 회사의 허락 없이 제3자에게 제공한 경우<br/> 
⑤ 회사 서비스를 통해 검증되지 않은 허위정보, 광고/홍보성 활동, 회사가 허락하지 않은 진료행위나 선전을 위한 장소로 이용하는 경우<br/> 
⑥ 회사를 이용하여 법령과 본 약관이 금지하거나 미풍양속에 반하는 행위를 하는 경우 
⑦ 본 약관을 위반한 경우<br/> 
⑧ 기타 회원으로서의 자격을 지속시키는 것이 부적절하다고 판단되는 경우<br/> 
(3) 회사가 회원 자격을 상실시키는 경우, 회원에게 이를 통지하고 회원등록 말소 전에 소명할 기회를 부여합니다. 단, 회원에게 통지가 도달한 날로부터 7일 이내에 이메일 등을 통해 소명해야 하며, 7일이 지난 이후에는 회원자격이 자동 상실 처리가 됩니다.<br/> 
(4) 회원 탈퇴는 이지수병원그룹 통합 홈페이지의 모든 사이트에 대해 회원탈퇴를 하게 되며, 제2항의사유로 회원자격을 상실한 경우 재가입시 제한을 받게 됩니다.<p/> 
제11조 회원에 대한 통지 <br/>
(1) 회사는 회원이 가입 시 등록한 이메일 또는 전화번호로 회원에 대한 통지를 합니다.<br/> 
(2) 불특정 회원, 비회원에 대한 통지의 경우, 게시판 등에 게시함으로써 개별통지로 갈음합니다.<p/> 
제12조 회원의 재가입<br/> 
본 약관 제10조의 규정에 따라 회원을 탈퇴한 전 회원이 재가입을 원할 경우 본 약관 제5조에 따라 회원가입을 할 수 있습니다.<p/> 
제3장 개인정보의 보호<p/> 
제13조 개인정보의 수집<br/> 
(1) 회사는 본 서비스의 원활한 활용을 위해 필요한 이용자의 신상정보를 수집할 수 있습니다.<br/> 
(2) 이용자의 개인정보를 수집하는 때에는 이하 각 호의 경우를 제외하고는 당해 이용자의 동의를 받습니다.<br/> 
① 법률에 특별한 규정이 있는 경우<br/> 
② 서비스이용계약의 이행을 위해서 필요한 경우<br/> 
(3) 회사는 개인정보의 분실, 도난, 유출, 변조되지 아니하도록 안정성 확보에 필요한 기술적 조치 등을 강구해야 합니다.<br/> 
(4) 제공된 개인정보는 당해 이용자의 동의 없이 목적 외 이용이나 제3자에게 제공할 수 없습니다. 단, 다음의 경우에는 예외로 합니다.<br/> 
① 법률에 특별한 규정이 있는 경우 <br/>
② 사용자 인증 절차 및 사이트 내 정보서비스 제공 <br/>
③ 서비스의 제공에 따른 요금정산 및 배송 등을 위하여 필요한 경우<br/> 
④ 통계작성ㆍ학술연구 또는 시장조사를 위하여 필요한 경우로서 특정 개인을 식별할 수 없는 형태로 제공하는 경우<p/> 
제4장 인터넷 진료예약 서비스에 관한 책임의 제한 <p/>
제14조 진료예약의 신청 및 성립<br/> 
(1) 이용자는 홈페이지상에서 이하의 방법에 의하여 진료예약을 신청합니다.<br/> 
① 아이디, 비밀번호, 환자등록번호 또는 주민등록번호, 성명, 주소, 전화번호, 이메일 등 예약시 필요사항 입력 <br/>
② 병원, 진료과/센터, 의사명, 예약일시 선택 <br/>
③ 이 약관에 동의한다는 표시 <br/>
④ 선택 진료인 경우 이에 대해 동의한다는 표시<br/> 
(2) 병원은 제1항의 예약신청에 대하여 다음 각호의 사유에 해당하지 않는 한 승낙합니다.<br/> 
① 신청 내용에 허위, 기재누락, 오기가 있는 경우 <br/>
② 기타 예약신청에 승낙하는 것이 기술상 현저히 지장이 있다고 판단하는 경우 <br/>
③ 병원방침에 의하여 특정의사 및 진료에 대해 인터넷 진료예약이 불가능하다고 판단되는 경우<br/> 
(3) 이용자가 인터넷 진료예약을 이용할 경우 인터넷 진료예약서비스를 통한 예약취소 및 변경은 인터넷 진료예약서비스를 통해 성립된 예약에 한합니다.<p/>
제15조 (건강상담서비스)<br/>
(1) 병원은 이용자의 상담 내용이 상담의사를 제외한 제3자에게 유출되지 않도록 최선을 다해 보안을 유지하려고 노력합니다. 다만, 다음 각호의 사유로 인하여 상담 내용이 공개 또는 훼손된 경우 병원은 책임을 지지 않습니다.<br/>
① 사용자의 부주의로 비밀번호가 유출된 경우<br/> 
② 사용자가 "상담삭제" 기능을 사용한 경우<br/> 
③ 천재지변 등 기타 불가항력에 의한 경우<br/> 
(2) 이용자의 상담요청에 대한 종합적이고 적절한 답변을 위하여 상담 의사들은 상담 내용과 답변을 참고할 수 있습니다.<br/>
(3) 서비스에서 진행된 상담 내용은 특정 개인을 식별할 수 없는 형태로 다음과 같은 목적으로 사용할 수 있습니다.<br/>
① 학술활동 <br/>
② 인쇄물, CD-ROM 등의 저작활동 <br/>
③ FAQ, 추천상담 등의 서비스 내용의 일부 <br/>
(4) 상담에 대한 답변 내용은 각 전문 의사의 의학적 지식을 바탕으로 한 주관적인 답변으로 병원의 공식적인 의견이 될 수 없으며, 상담내용에 대하여 병원은 일체의 책임을 지지 않습니다.<br/>
(5) 다음과 같은 상담신청의 경우에는 상담을 거절할 수 있습니다.<br/>
① 같은 내용의 상담을 반복하여 신청하는 경우 <br/>
② 상식에 어긋나는 표현을 사용하여 상담을 신청하는 경우 <br/>
③ 진단명을 요구하는 상담을 신청하는 경우 <br/>
④ 치료비, 검사비, 의약품 가격 등에 대하여 상담을 신청하는 경우<p/>
제16조 (건강관련정보 제공 서비스)<br/>
(1) 병원에서 제공하는 건강관련정보는 개략적이며 일반적인 것으로서 특정인의 의견에 지나지 않으며 어떠한 경우에도 전문적인 의학적 진단, 진료, 치료를 대신할 수 없습니다.<br/> 
(2) 병원은 건강관련정보제공서비스에서 언급된 어떠한 특정한 검사나 제품 또는 치료법을 보증하지 않습니다.<br/>
(3) 병원이 제공하는 건강관련정보는 전적으로 이용자의 판단에 따라 이용되는 것으로서, 병원은 건강관련정보의 제공과 관련하여 어떠한 책임도 지지 않습니다.<p/>
제5장 회사 및 이용자의 의무<p/> 
제17조 회사의 의무<br/> 
(1) 회사는 시스템 점검 및 서비스 개발, 통신장애, 기타 불가항력적인 사고 등 특별한 사정이 없는 한 이 약관 및 동의서가 정한 바에 따라 지속적으로 안정적인 서비스를 제공할 의무가 있습니다.<br/> 
(2) 회사는 이용자의 신용정보를 포함한 개인신상정보의 보안에 대하여 기술적 안전 조치를 강구하고 관리에 만전을 기함으로써 이용자의 정보보안에 최선을 다합니다. <br/>
(3) 회원은 언제든지 자신의 개인정보를 열람할 수 있고 병원 또는 정보관리책임자에게 잘못된 정보에 대한 정정을 요청할 수 있습니다. <br/>
(4) 회사는 이용자가 원하지 않는 영리목적의 광고성 이메일을 발송하지 않습니다. <p/>
제18조 이용자의 의무 <br/>
(1) 이용자는 서비스를 이용할 때 다음 각호의 행위를 하지 않아야 합니다. <br/>
① 신청 또는 변경 시 허위내용의 등록<br/> 
② 본인 이외의 주민등록번호 및 비밀번호를 부정하게 사용하는 행위 <br/>
③ 홈페이지에 게시된 정보의 변경 <br/>
④ 서비스를 이용하여 얻은 정보를 회원의 개인적인 이용 외에 복사, 가공, 번역, 2차적 저작 등을 통하여 복제, 공연, 방송, 전시, 배포, 출판 등에 사용하거나 제3자에게 제공하는 행위 
⑤ 타인의 명예를 손상시키거나 불이익을 주는 행위 <br/>
⑥ 회사의 저작권, 제3자의 저작권 등 기타 권리를 침해하는 행위 <br/>
⑦ 공공질서 및 미풍양속에 위반되는 내용의 정보, 문장, 도형, 음성 등을 타인에게 유포하는 행위<br/> 
⑧ 범죄와 결부된다고 객관적으로 인정되는 행위 <br/>
⑨ 서비스와 관련된 설비의 오동작이나 정보 등의 파괴 및 혼란을 유발시키는 컴퓨터 바이러스 감염자료를 등록 또는 유포하는 행위 <br/>
⑩ 서비스의 안정적 운영을 방해할 수 있는 정보를 전송하거나 수신자의 의사에 반하여 광고성 정보를 전송하는 행위 <br/>
⑪ 다른 이용자에 대한 건강진료 및 상담을 하거나 알선하는 행위 <br/>
⑫ 기타 관계법령에 위배되는 행위<br/> 
(2) 이용자는 서비스 이용시 아이디와 비밀번호 사용에 대한 다음과 같은 의무를 이행해야 합니다.<br/>
① 이용자는 회사 사이트 내의 서비스를 이용하는 경우 아이디 및 비밀번호를 사용해야 합니다.
② 아이디와 비밀번호에 관한 모든 관리의 책임은 이용자에게 있습니다.
③ 이용자는 자신의 아이디 및 비밀번호를 제3자에게 이용하게 해서는 안됩니다.
④ 이용자의 아이디 및 비밀번호의 관리의 부실로 인한 모든 책임은 이용자가 부담합니다.
⑤ 이용자는 아이디 및 비밀번호를 도난 당하거나 제3자에게 사용되고 있음을 인지한 경우에는 바로 회사에 통보하고 회사의 안내가 있는 경우에는 그에 따라야 합니다.
⑥ 회원의 ID(고유번호)는 회사의 사전 동의 없이 변경할 수 없습니다.<p/>
제6장 기타<p/> 
제19조 저작권의 귀속 및 이용제한<br/> 
(1) 회사가 작성한 저작물에 대한 저작권, 기타 지적재산권은 회사에 귀속됩니다.<br/> 
(2) 이용자는 홈페이지를 이용함으로써 얻은 정보를 회사의 사전 승낙 없이 복제, 송신, 출판, 배포, 방송 기타 방법에 의하여 영리목적으로 이용하거나 제3자에게 이용하게 하여서는 안됩니다.<p/> 
제20조 회원의 게시물<br/> 
(1) 게시물이라 함은 회원이 서비스를 이용하면서 게시한 글, 사진, 각종 파일과 링크 등을 말합니다.<br/>
(2) 회원이 서비스에 등록하는 게시물 및 타인 게시물의 활용 등으로 인하여 본인 또는 타인에게 손해나 기타 문제가 발생하는 경우 회원은 이에 대한 책임을 지게 되며, 회사는 특별한 사정이 없는 한 이에 대하여 책임을 지지 않습니다.<br/>
(3) 회사는 회원이 게시하거나 등록하는 "서비스" 내의 내용물이 다음 각 호에 해당한다고 판단되는 경우에 사전통지 없이 삭제할 수 있습니다. 단, 회사는 이러한 정보의 삭제 등을 할 의무를 지지 않습니다.<br/> 
① 다른 회원 또는 제3자를 비방하거나 명예를 손상시키는 내용인 경우
② 공공질서 및 미풍양속에 위반되는 내용인 경우
③ 범죄적 행위에 결부된다고 인정되는 내용일 경우
④ 회사의 저작권, 제3자의 저작권 등 기타 권리를 침해하는 내용인 경우
⑤ 회사의 규정한 게시기간을 초과한 경우
⑥ 회원이 자신의 홈페이지와 게시판에 음란물을 게재하거나 음란사이트를 링크하는 경우
⑦ 기타 본 약관 및 관련 법령에 위반된다고 판단되는 경우<p/>
제21조 개인정보 위탁<br/> 
회사는 수집된 개인정보의 취급 및 관리 등의 업무(이하 "업무")를 스스로 수행함을 원칙으로 하나, 필요한 경우 업무의 일부 또는 전부를 회사가 선정한 회사에 위탁할 수 있습니다.<p/>
제22조 양도금지<br/> 
회원은 서비스의 이용권한, 기타 이용 계약상 지위를 타인에게 양도, 증여할 수 없으며 게시물에 대한 저작권을 포함한 모든 권리 및 책임은 이를 게시한 회원에게 있습니다.<p/>
제23조 손해배상 <br/>
(1) 회원이 본 약관의 규정을 위반함으로 인하여 회사에 손해가 발생하게 되는 경우, 위 약관을 위반한 회원은 회사에 발생하는 모든 손해를 배상하여야 합니다.<br/>
(2) 회원이 서비스를 이용함에 있어 행한 불법행위나 본 약관 위반행위로 인하여 회사가 당해 회원 이외의 제3자로부터 손해배상 청구 또는 소송을 비롯한 각종 이의제기를 받는 경우 당해 회원은 자신의 책임과 비용으로 회사를 면책시켜야 하며, 회사가 면책되지 못한 경우 당해 회원은 그로 인하여 회사에 발생한 모든 손해를 배상하여야 합니다.<p/>
제24조 면책사항 <br/>
(1) 회사는 천재지변, 전쟁, 기간통신사업자의 서비스 중지 또는 이에 준하는 불가항력으로 인하여 서비스를 제공할 수 없는 경우에는 서비스 제공에 관한 책임이 면제됩니다.<br/>
(2) 회사는 회원의 귀책사유로 인한 서비스의 이용장애에 대하여 책임을 지지 않습니다.<br/>
(3) 회사는 회원이 서비스를 이용하여 기대하는 수익을 상실한 것에 대하여 책임을 지지 않으며 그 밖에 서비스를 통하여 얻은 자료로 인한 손해 등에 대하여도 책임을 지지 않습니다.<br/> 
(4) 회사는 회원이 사이트에 게재한 정보, 자료, 사실의 신뢰도 및 정확성 등 내용에 대하여는 책임을 지지 않습니다.<br/>
(5) 회사는 서비스용 설비의 보수, 교체, 정기점검, 공사 등 부득이한 사유로 발생한 손해에 대한 책임을 지지 않습니다.<br/>
(6) 회사는 회원 상호간 또는 회원과 제3자 상호간에 서비스를 매개로 발생한 분쟁에 대해서는 개입할 의무가 없으며 이로 인한 손해를 배상할 책임도 없습니다.<p/>
제25조 분쟁해결<br/> 
(1) 회사와 이용자는 서비스와 관련하여 발생한 분쟁을 원활하게 해결하기 위하여 필요한 모든 노력을 하여야 합니다.<br/>
(2) 회사는 이용자로부터 제출되는 불만사항 및 의견은 우선적으로 그 사항을 처리합니다. 다만, 신속한 처리가 곤란한 경우에는 이용자에게 그 사유와 처리일정을 즉시 통보해 줍니다.<p/> 
제26조 관할법원 및 준거법<br/> 
(1) 회사와 이용자간에 서비스 이용으로 발생한 분쟁에 관한 소송은 서울중앙지방법원을 전속적 합의 관할법원으로 합니다.<br/> 
(2) 회사와 이용자간에 제기된 소송에는 대한민국 법을 적용합니다.<p/>
부칙<p/>
① 이 약관은 2018년 8월 21일부터 적용됩니다.<br/>
<br/> 

</div><p/>
<div class="attr-value"><input type="checkbox" name ="check1" id = "check1" required> (이용 약관에 동의합니다.)</div>
</div><p/><Br><br><br>

<!--약관 2-->
<div class="kboard-attr-row">
<b><label class="attr-name" style="font-size:20px; font-weight:bold;">개인정보 수집 및 이용에 대한 안내</label></b><p/>

<div style="overflow: scroll; width: 650px; height: 180px; padding: 10px; background-color: white;"> 
  <b>개인정보 수집 및 이용약관</b><p/>

이 약관은 주식회사 나이스정보통신 주식회사(이하 회사라 함)가 제공하는 전자지급결제대행서비스 및 결제대금예치서비스를 이용자가 이용함에 있어 회사와 이용자 사이의 개인정보 수집 및 이용에 대한 기본적인 사항을 정함을 목적으로 합니다.<p/>

1.회사는 다음과 같은 목적 하에 “서비스”와 관련한 개인정보를 수집합니다.<br/>
◦서비스 제공 계약의 성립, 유지, 종료를 위한 본인 식별 및 실명확인, 각종 회원관리<br/>
◦서비스 제공 과정 중 본인 식별, 인증, 실명확인 및 회원에 대한 각종 안내/고지<br/>
◦대금 환불, 상품배송 등 전자상거래 관련 서비스 제공<br>
◦서비스 제공 및 관련 업무처리에 필요한 동의 또는 철회 등 의사확인<br/>
◦이용 빈도 파악 및 인구통계학적 특성에 따른 서비스 제공 및 CRM<br/>
◦기타 회사가 제공하는 이벤트 등 광고성 정보 전달, 통계학적 특성에 따른 서비스 제공 및 광고 게재, 실제 마케팅 활동<p/>


2.결제수단별 회사가 수집하는 개인정보의 항목은 다음과 같습니다.<br/>
◦전자금융거래서비스 이행과 관련 수집 정보<br/> ◾이용자의 고유식별번호<br/>
◾이용자의 신용카드 정보 또는 지불하고자 하는 금융기관 계좌 정보<br/>
◾이용자의 이메일<br/>
◾이용자의 상품 또는 용역 거래 정보<p/>



3.이용자의 개인정보는 원칙적으로 개인정보의 수집 및 이용목적이 달성되면 지체 없이 파기 합니다. 단, 다음의 정보에 대해서는 아래의 이유로 명시한 기간 동안 보존 합니다.<br/>
1.회사 내부 방침의 의한 정보보유<br/> ◾보존항목: 서비스 상담 수집 항목(회사명, 고객명, 전화번호, E-mail, 상담내용 등)<br/>
◾보존이유: 분쟁이 발생 할 경우 소명자료 활용<br/>
◾보존기간: 상담 완료 후 6개월<p/>

2.관련법령에 의한 정보보유 ◾상법, 전자상거래 등에서의 소비자보호에 관한 법률, 전자금융거래법 등 관련법령의 규정에 의하여 보존할 필요가 있는 경우 회사는 관련법령에서 정한 일정한 기간 동안 정보를 보관합니다. 이 경우 회사는 보관하는 정보를 그 보관의 목적으로만 이용하며 보존기간은 아래와 같습니다.<br/>
◾계약 또는 청약철회 등에 관한 기록<br/> ◾보존기간: 5년 / 보존근거: 전자상거래 등에서의 소비자보호에 관한 법률<br/>

◾대금결제 및 재화 등의 공급에 관한 기록<br/> ◾보존기간: 5년 / 보존근거: 전자상거래 등에서의 소비자보호에 관한 법률<br/>
◾(단, 건당 거래 금액이 1만원 이하의 경우에는 1년간 보존 합니다).<br/>

◾소비자의 불만 또는 분쟁처리에 관한 기록<br/> ◾보존기간: 3년 / 보존근거: 전자상거래 등에서의 소비자보호에 관한 법률<br/>

◾신용정보의 수집/처리 및 이용 등에 관한 기록<br/> ◾보존기간: 3년 / 보존근거: 신용정보의 이용 및 보호에 관한 법률<br/>

◾본인확인에 관한 기록<br/> ◾보존기간: 6개월 / 보존근거: 정보통신 이용촉진 및 정보보호 등에 관한 법률<br/>

◾방문에 관한 기록<br/> ◾보존기간: 3개월 / 보존근거: 통신비밀보호법<p/>




4.이용자는 회사의 개인정보 수집 및 이용 동의를 거부할 수 있습니다. 단, 동의를 거부 하는 경우 서비스 결제가 정상적으로 완료 될 수 없음을 알려 드립니다.<br/>
1.회사 내부 방침의 의한 정보보유<br/> ◾보존항목: 서비스 상담 수집 항목(회사명, 고객명, 전화번호, E-mail, 상담내용 등)<br/>
◾보존이유: 분쟁이 발생 할 경우 소명자료 활용<br/>
◾보존기간: 상담 완료 후 6개월<p/>

2.관련법령에 의한 정보보유<br/> ◾상법, 전자상거래 등에서의 소비자보호에 관한 법률, 전자금융거래법 등 관련법령의 규정에 의하여 보존할 필요가 있는 경우 회사는 관련법령에서 정한 일정한 기간 동안 정보를 보관합니다. 이 경우 회사는 보관하는 정보를 그 보관의 목적으로만 이용하며 보존기간은 아래와 같습니다.<br/>
◾계약 또는 청약철회 등에 관한 기록<br/> ◾보존기간: 5년 / 보존근거: 전자상거래 등에서의 소비자보호에 관한 법률<br/>

◾대금결제 및 재화 등의 공급에 관한 기록<br/> ◾보존기간: 5년 / 보존근거: 전자상거래 등에서의 소비자보호에 관한 법률<br/>
◾(단, 건당 거래 금액이 1만원 이하의 경우에는 1년간 보존 합니다).<br/>

◾소비자의 불만 또는 분쟁처리에 관한 기록<br/> ◾보존기간: 3년 / 보존근거: 전자상거래 등에서의 소비자보호에 관한 법률<br/>

◾신용정보의 수집/처리 및 이용 등에 관한 기록<br/> ◾보존기간: 3년 / 보존근거: 신용정보의 이용 및 보호에 관한 법률<br/>

◾본인확인에 관한 기록<br/> ◾보존기간: 6개월 / 보존근거: 정보통신 이용촉진 및 정보보호 등에 관한 법률<br/>

◾방문에 관한 기록<br/> ◾보존기간: 3개월 / 보존근거: 통신비밀보호법<br/>
</div><p/> 

<div class="attr-value"><input type="checkbox" name="check2" id="check2" required> (개인정보 수집 및 이용에 동의합니다.)</div><p/>
</div></center><br>
<hr><p/><br>


   <center>
   <div id="name" style="font-size:20px; font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이름
   <input type="text" name="user_name" id="user_name" maxlength="20" style="width:220px; height:20px;"><br><br></div>  
 
   <div id="id" style="font-size:20px; font-weight:bold;">
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;아이디
   <input type="text" name="user_id" id="user_id" maxlength="13" style="width:220px; height:20px;" >
   <input type="button" value="중복확인" name="" onclick="possible()"><br></div>
     <div id="idch">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;아이디를 입력하세요.<input type="hidden" value="0" name="use"><br><br></div>
       
            
   <div id="pw" style="font-size:20px; font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;비밀번호
   <input type="password" name="user_password" id="user_password" maxlength="13" style="width:220px; height:20px;"><br><br></div>
   
   <div id="pwch" style="font-size:20px; font-weight:bold;">비밀번호확인
   <input type="password" name="pwch" id="pwch" onkeyup="check_pw(this.value)" style="width:220px; height:20px;"></div>      
   <div id="check">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;비밀번호를 확인하세요.<br><br></div>  
	
   <div id="birth" style="font-size:20px; font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;생년월일
   <select name = "year">
      <option value="1960">1960</option>
      <option value="1961">1961</option>
      <option value="1962">1962</option>
      <option value="1963">1963</option>
      <option value="1964">1964</option>
      <option value="1965">1965</option>
      <option value="1966">1966</option>
      <option value="1967">1967</option>
      <option value="1968">1968</option>
      <option value="1969">1969</option>
      <option value="1970">1970</option>
      <option value="1971">1971</option>
      <option value="1972">1972</option>
      <option value="1973">1973</option>
      <option value="1974">1974</option>
      <option value="1975">1975</option>
      <option value="1976">1976</option>
      <option value="1977">1977</option>
      <option value="1978">1978</option>
      <option value="1979">1979</option>
      <option value="1980">1980</option>
      <option value="1981">1981</option>
      <option value="1982">1982</option>
      <option value="1983">1983</option>
      <option value="1984">1984</option>
      <option value="1985">1985</option>
      <option value="1986">1986</option>
      <option value="1987">1987</option>
      <option value="1988">1988</option>
      <option value="1989">1989</option>
      <option value="1990">1990</option>
      <option value="1991">1991</option>
      <option value="1992">1992</option>
      <option value="1993">1993</option>
      <option value="1994">1994</option>
      <option value="1995">1995</option>
      <option value="1996">1996</option>
      <option value="1997">1997</option>
      <option value="1998">1998</option>
      <option value="1999">1999</option>
      <option value="2000">2000</option>
      <option value="2001">2001</option>
      <option value="2002">2002</option>
      <option value="2003">2003</option>
      <option value="2004">2004</option>
      <option value="2005">2005</option>
      <option value="2006">2006</option>
      <option value="2007">2007</option>
      <option value="2008">2008</option>
      <option value="2009">2009</option>
      <option value="2010">2010</option>
      <option value="2011">2011</option>
      <option value="2012">2012</option>
      <option value="2013">2013</option>
      <option value="2014">2014</option>
      <option value="2015">2015</option>
      <option value="2016">2016</option>
      <option value="2017">2017</option>
      <option value="2018">2018</option>
   </select>
   년
   
   <select name = "month">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
   </select>
   월 
   
   <select name = "days">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
      <option value="24">24</option>
      <option value="25">25</option>
      <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
      <option value="29">29</option>
      <option value="30">30</option>
      <option value="31">31</option>
   </select>
   일<br><br></div>   
	
   <div id="gender" style="font-size:20px; font-weight:bold;">성별
   &nbsp;&nbsp;&nbsp;&nbsp;남자 <input type="radio" value="남자" name="user_gender" id="user_gender"> 
   여자 <input type="radio" value="여자" name="user_gender" id="user_gender" checked="checked"><br><br></div>
	
   <div id="tel" style="font-size:20px; font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;전화번호
   <input type="text" name="user_phonenum" id="user_phonenum" maxlength="11" placeholder="ex) 01038509872" style="width:220px; height:20px;"><br><br></div>
    
   <div id="add" style="font-size:20px; font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;주소
   <input type="text" name="zonecode" id="zonecode" value="" style="width:50px;" readonly/> 우편번호&nbsp;
         <input type="button" onClick="openDaumZipAddress();" value = "주소 찾기" /><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <input type="text" name="address" id="address" value="" style="width:240px;" readonly/><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <input type="text" name="address_etc" id="address_etc" value="" style="width:200px;"/><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 상세주소를 입력해주세요.
         <br><br></div>

   <div id="email" style="font-size:20px; font-weight:bold;">
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이메일	
   <input type="email" name="user_email" id="user_email" maxlength="30" placeholder="ex) aaa@email.com" style="width:220px; height:20px;">
	<input type="button" name="" value="인증하기" onclick="mail()"></div>
      <div emailc="email">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이메일을 입력하세요.<br><input type="hidden" value="0" name="use1"/></div>        
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="text" name="email_veri" id="email_veri" required style="width:220px; height:20px;"><br><br>
		

<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="image" onclick="return blank_up()" src="signup.jpg" style="width:90px; height:35px;">
<a href="home.php"><img src="main.jpg" alt="메인으로" style="width:90px; height:35px;"></a></div><br><br><br></center>
</form>
 
</body>
</html>

