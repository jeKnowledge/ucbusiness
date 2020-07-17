<div id="header">
  <div id="header_left">
    <a href="/admin ">
      <img id="logo_ucb" src="/views/assets/images/ucb_white.png" alt="logo_uc" />
    </a>
    <h2>Admin page</h2>
  </div>

  <div id="header_right">
      <h3> Hi <?= $this->user->FirstName." ".$this->user->LastName ?> </h3>
      <a href="/logout">
        <button type="button"> Log out</button>
      </a>
  </div>

</div>
