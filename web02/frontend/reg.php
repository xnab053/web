<fieldset>
    <legend>會員註冊</legend>
    <!-- div+table>tr*5>td.clo+td>input:text -->
    <div style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</div>
    <table>
        <tr>
            <td class="clo">Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <button onclick="reg()">註冊</button>
                <button onclick="clear()">清除</button>
            </td>
            <td></td>
        </tr>
    </table>
</fieldset>
<script>
    function reg() {
        let user = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val(),
        }

        if (user.acc == '' || user.pw == '' || user.pw2 == '' || user.email == '') {
            alert("不可空白")
        } else if (user.pw != user.pw2) {
            alert("密碼錯誤")
        } else {
            $.post('./api/chk_acc.php', {
                acc: user.acc
            }, (chk) => {
                if (parseInt(chk) == 1) {
                    alert("帳號重複")
                } else {
                    $.post("./api/reg.php", user, (res) => {
                        //console.log(res)
                        alert("註冊完成，歡迎加入")
                    })
                }
            })
        }

    }
</script>