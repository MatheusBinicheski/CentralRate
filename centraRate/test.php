<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="styles/kendo.common.min.css" />
    <link rel="stylesheet" href="styles/kendo.default.min.css" />

    <script src="js/jquery.min.js"></script>
    <script src="js/jszip.min.js"></script>
    <script src="js/kendo.all.min.js"></script>
</head>
<body>
<div id="example">

    <div class="box wide">
        <p style="margin-bottom: 1em"><b>Important:</b></p>

        <p style="margin-bottom: 1em">— This page loads pako_deflate.min.js.  This enables compression
        in the PDF, and it is required if your dataset is very large.
        Chrome is known to crash on grids with lots of pages when pako is
        not loaded.</p>

        <p>— In order for the output to be precise, and for Unicode support,
        you must declare TrueType fonts.  Please read the information about
        fonts
        <a href="http://docs.telerik.com/kendo-ui/framework/drawing/drawing-dom#custom-fonts-and-pdf">here</a>
        and <a href="http://docs.telerik.com/kendo-ui/framework/drawing/pdf-output#using-custom-fonts">here</a>.
        This demo renders the grid in "DejaVu Sans" font family, which is
        declared in kendo.common.css, but it also declares the paths to the
        font files using <tt>kendo.pdf.defineFont</tt>, because the
        stylesheet is hosted on a different domain.
        </p>
    </div>

    <div id="grid"></div>
    <script id="rowTemplate" type="text/x-kendo-tmpl">
        <tr data-uid="#: uid #">
            <td class="photo">
               <img src="../content/web/Employees/#: EmployeeID #.jpg" alt="#: EmployeeID #" />
            </td>
            <td class="details">
               <span class="name">#: FirstName# #: LastName# </span>
               <span class="title">Title: #: Title #</span>
            </td>
            <td class="country">
                #: Country #
            </td>
            <td class="employeeID">
               #: EmployeeID #
            </td>
       </tr>
    </script>
    <script id="altRowTemplate" type="text/x-kendo-tmpl">
        <tr class="k-alt" data-uid="#: uid #">
            <td class="photo">
               <img src="../content/web/Employees/#: data.EmployeeID #.jpg" alt="#: EmployeeID #" />
            </td>
            <td class="details">
               <span class="name">#: FirstName# #: LastName# </span>
               <span class="title">Title: #: Title #</span>
            </td>
            <td class="country">
                #: Country #
            </td>
            <td class="employeeID">
               #: EmployeeID #
            </td>
       </tr>
    </script>

    <style>
        /*
            Use the DejaVu Sans font for display and embedding in the PDF file.
            The standard PDF fonts have no support for Unicode characters.
        */
        .k-grid {
            font-family: "DejaVu Sans", "Arial", sans-serif;
        }

        /* Hide the Grid header and pager during export */
        .k-pdf-export .k-grid-toolbar,
        .k-pdf-export .k-pager-wrap
        {
            display: none;
        }
    </style>

    <script>
        // Import DejaVu Sans font for embedding

        // NOTE: Only required if the Kendo UI stylesheets are loaded
        // from a different origin, e.g. cdn.kendostatic.com
        kendo.pdf.defineFont({
            "DejaVu Sans"             : "http://cdn.kendostatic.com/2014.3.1314/styles/fonts/DejaVu/DejaVuSans.ttf",
            "DejaVu Sans|Bold"        : "http://cdn.kendostatic.com/2014.3.1314/styles/fonts/DejaVu/DejaVuSans-Bold.ttf",
            "DejaVu Sans|Bold|Italic" : "http://cdn.kendostatic.com/2014.3.1314/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf",
            "DejaVu Sans|Italic"      : "http://cdn.kendostatic.com/2014.3.1314/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf"
        });
    </script>

    <!-- Load Pako ZLIB library to enable PDF compression -->
    <script src="http://cdn.kendostatic.com/2015.2.624/js/pako_deflate.min.js"></script>

    <script>
         $("#grid").kendoGrid({
            toolbar: ["pdf"],
            pdf: {
                allPages: true,
                fileName: "Kendo UI Grid Export.pdf",
                proxyURL: "http://demos.telerik.com/kendo-ui/service/export"
            },
            dataSource: {
              type: "odata",
              transport: {
                  read: {
                      url: "http://demos.telerik.com/kendo-ui/service/Northwind.svc/Employees",
                  }
              },
              pageSize: 5
            },
            columns: [
                { title: "Photo", width: 140 },
                { title: "Details", width: 350 },
                { title: "Country" },
                { title: "EmployeeID" }
            ],
            rowTemplate: kendo.template($("#rowTemplate").html()),
            altRowTemplate: kendo.template($("#altRowTemplate").html()),
            height: 500,
            scrollable: true,
            pageable: true
        });
    </script>
    <style>
        .employeeID,
        .country {
            font-size: 50px;
            font-weight: bold;
            color: #898989;
        }
        .name {
            display: block;
            font-size: 1.6em;
        }
        .title {
            display: block;
            padding-top: 1.6em;
        }
        td.photo, .employeeID {
            text-align: center;
        }
        .k-grid-header .k-header {
            padding: 10px 20px;
        }
        .k-grid tr {
            background: -moz-linear-gradient(top,  rgba(0,0,0,0.05) 0%, rgba(0,0,0,0.15) 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0.05)), color-stop(100%,rgba(0,0,0,0.15)));
            background: -webkit-linear-gradient(top,  rgba(0,0,0,0.05) 0%,rgba(0,0,0,0.15) 100%);
            background: -o-linear-gradient(top,  rgba(0,0,0,0.05) 0%,rgba(0,0,0,0.15) 100%);
            background: -ms-linear-gradient(top,  rgba(0,0,0,0.05) 0%,rgba(0,0,0,0.15) 100%);
            background: linear-gradient(to bottom,  rgba(0,0,0,0.05) 0%,rgba(0,0,0,0.15) 100%);
            padding: 20px;
        }
        .k-grid tr.k-alt {
            background: -moz-linear-gradient(top,  rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.1) 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0.2)), color-stop(100%,rgba(0,0,0,0.1)));
            background: -webkit-linear-gradient(top,  rgba(0,0,0,0.2) 0%,rgba(0,0,0,0.1) 100%);
            background: -o-linear-gradient(top,  rgba(0,0,0,0.2) 0%,rgba(0,0,0,0.1) 100%);
            background: -ms-linear-gradient(top,  rgba(0,0,0,0.2) 0%,rgba(0,0,0,0.1) 100%);
            background: linear-gradient(to bottom,  rgba(0,0,0,0.2) 0%,rgba(0,0,0,0.1) 100%);
        }
    </style>
</div>


</body>
</html>
