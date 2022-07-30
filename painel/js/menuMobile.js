$(function () {
  let open = true;
  let windowSize = $(window)[0].innerWidth; // O 0 pega as funções nativas do Js, se fosse somente window pega jquery

  if (windowSize <= 768) {
    open = false;
  }

  $(".menu-btn").click(function () {
    if (open) {
      $(".menu").animate(
        {
          width: "0",
          padding: "0",
        },
        () => {
          open = false;
        }
      );

      $(".panel, .header-panel").css("width", "100%");

      $(".panel, .header-panel").animate(
        {
          left: "0",
        },
        () => {
          open = false;
        }
      );
    } else {
      $(".menu").css("display", "block");
      $(".menu").animate(
        {
          width: "300px",
          padding: "10px",
        },
        () => {
          open = true;
        }
      );

      $(".panel, .header-panel").css({
        width: "calc(100% - 300px)",
      });

      $(".panel").animate(
        {
          left: "300px",
        },
        () => {
          open = true;
        }
      );
    }
  });
});
