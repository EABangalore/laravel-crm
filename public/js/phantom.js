/**
 * Create page object
 * command  usage ====> C:\xampp\htdocs\phantomjs-pdf>phantomjs report2.js http://s.codepen.io/amcharts/
      debug/cd2e8ce27e3a96f43bb79d5d23722d11 report3.pdf

*  format phantomjs <target website>  <filename to render(pdf,png,jpg,svg)>

*/
var page = require( 'webpage' ).create(),
    system = require('system');

/**
 * Check for required parameters
 */
if ( system.args.length < 3 ) {
  console.log( 'Usage: report.js <some URL> <output path/filename>' );
  phantom.exit();
}

/**
 * Grab the page and output it to specified target
 */
page.open( system.args[ 1 ], function( status ) {
  // console.log( "Status: " + status );

  // /**
  //  * Output the result
  //  */
  // if ( status === "success" ) {
  //   page.render( system.args[ 2 ] );
  // }

       window.setTimeout(function () {           
       if ( status === "success" ) {
           console.log( "Status: " + status );
          //page.render( 'example22.pdf');
          page.render( system.args[ 2 ] );
        }
            phantom.exit();
        }, 1600);  

 // phantom.exit();
} );
