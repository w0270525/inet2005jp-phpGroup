<!-- hide the login menu custom css-->
<style>


    #disappearing {
        display: none;
    }
    #disappearing:hover{
        display: block;
    }
    #minimized:hover~#disappearing{
        display: block;
    }


</style>
<form  action="#" method="POST" name="authorLogin" id="authorLogin" class="authorLogin" >
  <span class="minimized" id="minimized">
      <span class="input-group-addon">Webmasters Login</span>
  </span>
  <span class="disappearing" id="disappearing">

    <span>
        <span class="input-group-addon">
            <input type="text" class="form-control" placeholder="authorName"  id="authorName" name="authorName" required />
        </span>
        <span class="input-group-addon" >
            <input type="password" class="form-control" placeholder="passwordAuthor" id="passwordAuthor" name="passwordAuthor" required />
        </span>
        <span class="input-group-addon" >
            <button type="submit" class="form-control" value="login" id="login" >Login</button>
        </span>

    </span>
  </span>



</form>
