let InputMove = (function() {
  let pub = {};

  pub.setup = function() {

    let target = $("#scoreTally");
    target.html("<p>You: 0</p>" +
                "<p>Computer: 0</p>");

  };

  return pub;
}());

$(document).ready(InputMove.setup);
