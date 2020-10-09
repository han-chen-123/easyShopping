<?php

?>
<script type="text/javascript">
function checkText()
{
    if (document.getElementById("firstName").value == "")
    {
        alert("Please fill FirstName");
        return false;
    }
    if (document.getElementById("lastName").value == "")
    {
        alert("Please fill LastName");
        return false;
    }
    if (document.getElementById("address").value == "")
    {
        alert("Please fill Address");
        return false;
    }
    if (document.getElementById("suburb").value == "")
    {
        alert("Please fill Suburb");
        return false;
    }
    if (document.getElementById("state").value == "")
    {
        alert("Please fill State");
        return false;
    }
    if (document.getElementById("country").value == "")
    {
        alert("Please fill Country");
        return false;
    }
    var numbers = /[^\d\.]/g;
    if(numbers.test(document.getElementById("postCode").value) || document.getElementById("postCode").value == "")
    {
        alert("Please fill postCode and Only numbers are allowed");
        return false;
    }
    var emails = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if(!emails.test(document.getElementById("email").value) || document.getElementById("email").value == "")
    {
        alert("Please enter a valid Email");
        return false;
    }
    return true;
}

</script>
<h3>Please enter your delivery details below.</h3>
<p><span style="color: red">*</span>indicates required fields</p>
<form action="sendmail2.php" method="post" name="infoForm" onsubmit="return checkText()">
<table width="90%" border="0">
    <tr>
        <td>First Name <span style="color: #FF0000">*</span></td>
        <td><input type="text" name="firstName" id="firstName" size="50"></td>
    </tr>
    <tr>
        <td>Last Name <span style="color: #FF0000">*</span></td>
        <td><input type="text" name="lastName" id="lastName" size="50"></td>
    </tr>
    <tr>
        <td>Address<span style="color: #FF0000">*</span></td>
        <td><input type="text" name="address" id="address" size="50"></td>
    </tr>
    <tr>
        <td>Suburb<span style="color: #FF0000">*</span></td>
        <td><input type="text" name="suburb" id="suburb" size="50"></td>
    </tr>
    <tr>
        <td>State<span style="color: #FF0000">*</span></td>
        <td><input type="text" name="state" id="state" size="50" onblur="checkText()"></td>
    </tr>
    <!--country-->
    <tr>
        <td>Country<span style="color: #FF0000">*</span></td>
        <td><select name="country" id="country">
                <option value="" selected = "selected">- please select -</option>
                <option value="Afghanistan" id="Afghanistan">Afghanistan</option>
                <option value="Albania" id="Albania">Albania</option>
                <option value="Algeria" id="Algeria">Algeria</option>
                <option value="Anguilla" id="Anguilla">Anguilla</option>
                <option value="Australia" id="Australia">Australia</option>
                <option value="Bangladesh" id="Bangladesh">Bangladesh</option>
                <option value="Belarus" id="Belarus">Belarus</option>
                <option value="Belgium" id="Belgium">Belgium</option>
                <option value="Benin" id="Benin">Benin</option>
                <option value="Brazil" id="Brazil">Brazil</option>
                <option value="Canada" id="Canada">Canada</option>
                <option value="Chad" id="Chad">Chad</option>
                <option value="Colombia" id="Colombia">Colombia</option>
                <option value="China" id="China">China</option>
                <option value="Denmark" id="Denmark">Denmark</option>
                <option value="Dominica" id="Dominica">Dominica</option>
                <option value="Egypt" id="Egypt">Egypt</option>
                <option value="Finland" id="Finland">Finland</option>
                <option value="France" id="France">France</option>
                <option value="Gambia" id="Gambia">Gambia</option>
                <option value="Germany" id="Germany">Germany</option>
                <option value="India" id="India">India</option>
                <option value="Indonesia" id="Indonesia">Indonesia</option>
                <option value="Ireland" id="Ireland">Ireland</option>
                <option value="Italy" id="Italy">Italy</option>
                <option value="Japan" id="Japan">Japan</option>
                <option value="Korea" id="Korea">Korea</option>
                <option value="Malaysia" id="Malaysia">Malaysia</option>
                <option value="Mexico" id="Mexico">Mexico</option>
                <option value="Norway" id="Norway">Norway</option>
                <option value="Philippines" id="Philippines">Philippines</option>
                <option value="Romania" id="Romania">Romania</option>
                <option value="Turkey" id="Turkey">Turkey</option>
                <option value="Zambia" id="Zambia">Zambia</option>
                <option value="Zimbabwe" id="Zimbabwe">Zimbabwe</option>
            </select></td>
    </tr>

    <tr>
        <td>Post Code<span style="color: #FF0000">*</span></td>
        <td><input type="text" name="postCode" id="postCode" size="50"></td>
    </tr>
    <tr>
        <td>Email<span style="color: #FF0000">*</span></td>
        <td><input type="text" name="email" id="email" size="50"></td>
    </tr>
    <tr>
        <td align="center" colspan="3"><input type="submit" name="Purchase" value="send"></td>
    </tr>
</table>
</form>
