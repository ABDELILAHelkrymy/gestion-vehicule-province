

const logoutHandler = () => {
  let logout = document.querySelector(".log_out");
  if (logout) {
    logout.addEventListener("click", () => {
      // delete  a cookie named PHPSESSID
      document.cookie =
        "PHPSESSID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
      window.location.href = "/";
    });
  }
};
const downloadFile = () => {
  $(".download-file").on("click", function () {
    const filePath = $(this).data("file-path");
    const fileName = $(this).data("file-name");
    $.ajax({
      url: "/downloadFile",
      type: "POST",
      data: { filePath: filePath },
      xhrFields: {
        responseType: "blob",
      },
      success: function (response) {
        const blob = new Blob([response], { type: "application/pdf" });
        const url = URL.createObjectURL(blob);
        const link = document.createElement("a");
        // add link to the body and click it to download the file
        $("body").append(link);
        link.href = url;
        link.download = fileName;
        link.target = "_blank";
        link.click();
        setTimeout(function () {
          URL.revokeObjectURL(url);
        }, 1000);
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
        alert("Error downloading file!");
      },
    });
  });
};

const handleExportVehiculeCsvFile = () => {
  $(".export-vehicule-btn").on("click", function () {

    $.ajax({
      url: "/exportVehivule",
      type: "POST",
      contentType: "application/json",
      xhrFields: {
        responseType: "blob", // Important for handling binary response
      },
      success: function (response, status, xhr) {
        const disposition = xhr.getResponseHeader("Content-Disposition");
        let filename = "vehicules.xlsx";
        if (disposition && disposition.indexOf("attachment") !== -1) {
          const matches = /"([^"]*)"/.exec(disposition);
          if (matches != null && matches[1]) {
            filename = matches[1];
          }
        }
        const blob = new Blob([response], {
          type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
        });
        const url = URL.createObjectURL(blob);
        const link = document.createElement("a");
        link.href = url;
        link.download = filename;
        document.body.appendChild(link);
        link.click();
        setTimeout(function () {
          URL.revokeObjectURL(url);
        }, 1000);
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
};

$(document).ready(function () {
  logoutHandler();
  downloadFile();
  handleExportVehiculeCsvFile();
  // add key press to input search
  $(".search-input").keypress(function (e) {
    if (e.which == 13) {
      e.preventDefault();
      let search = $(this).val();
      window.location.href = `?q=${search}`;
    }
  });

  if ($("#type_vehicule_autre").is(":checked")) {
    $("#type_vehicule_input_autre").removeAttr("disabled");
  } else {
    $("#type_vehicule_input_autre").attr("disabled", "disabled");
  }

  $("#type_vehicule_autre").on("change", function () {
    if ($(this).is(":checked")) {
      $("#type_vehicule_input_autre").removeAttr("disabled");
    } else {
      $("#type_vehicule_input_autre").attr("disabled", "disabled");
    }
  });

  $("#type_vehicule").each(function () {
    $(this).on("change", function () {
      let selectedValue = $(this).val();
      $("#type_vehicule_input").attr("disabled", "disabled");
    });
  });

  // remove space from recommandations_groupe_field textarea
  const recommandations_groupe_field = $("#recommandations_groupe_field");
  recommandations_groupe_field.text(recommandations_groupe_field.text().trim());
  const recommandations_vehicule = $("#recommandations_vehicule");
  recommandations_vehicule.text(recommandations_vehicule.text().trim());
});
