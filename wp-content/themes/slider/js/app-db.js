jQuery(function() {
  const msg = exp => console.log(exp);
  jQuery.post(
    jsobject.ajaxurl,
    {
      action: "sort_action",
      params: "2 nœud, Segment"
    },
    function(response) {
      const ul = document.createElement("ul");
      ul.innerHTML = response;
      document.body.appendChild(ul);
      msg(response);
    }
  );
});
