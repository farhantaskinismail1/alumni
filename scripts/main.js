// var sheetName = 'Sheet1';
// var scriptProp = PropertiesService.getScriptProperties();

// function intialSetup() {
//   var activeSpreadsheet = SpreadsheetApp.getActiveSpreadsheet();
//   scriptProp.setProperty('key', activeSpreadsheet.getId());
// }

// function doPost(e) {
//   var lock = LockService.getScriptLock();
//   lock.tryLock(10000);

//   try {
//     var doc = SpreadsheetApp.openById(scriptProp.getProperty('key'));
//     var sheet = doc.getSheetByName(sheetName);

//     var headers = sheet.getRange(1, 1, 1, sheet.getLastColumn()).getValues()[0];
//     var nextRow = sheet.getLastRow() + 1;

//     var newRow = headers.map(function (header) {
//       return header === 'timestamp' ? new Date() : e.parameter[header];
//     });

//     sheet.getRange(nextRow, 1, 1, newRow.length).setValues([newRow]);

//     return ContentService.createTextOutput(
//       JSON.stringify({ result: 'success', row: nextRow })
//     ).setMimeType(ContentService.MimeType.JSON);
//   } catch (e) {
//     return ContentService.createTextOutput(
//       JSON.stringify({ result: 'error', error: e })
//     ).setMimeType(ContentService.MimeType.JSON);
//   } finally {
//     lock.releaseLock();
//   }
// }
document.addEventListener('DOMContentLoaded', function () {
  // বর্তমান পেজের URL পাথ নিন (যেমন: /pages/registration.html)
  const currentPath = window.location.pathname;

  // নেভিগেশন বারের সব লিঙ্ক খুঁজে বের করুন
  const links = document.querySelectorAll('.headRight ul li a');

  links.forEach((link) => {
    // লিঙ্কের href-এর সাথে বর্তমান URL পাথটি মিলিয়ে দেখুন
    // .endsWith() ব্যবহার করা হয় যাতে রিলেটিভ পাথ ঠিকমতো কাজ করে
    if (currentPath.endsWith(link.getAttribute('href'))) {
      // লিঙ্কটির প্যারেন্ট <li> ট্যাগে 'active' ক্লাসটি যোগ করুন
      link.parentNode.classList.add('active');
    }
  });
});
