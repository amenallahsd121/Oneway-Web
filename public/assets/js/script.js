$(document).ready(function() {
    var currentTab = 0; // current tab is set to be the first tab (0)
    var tabCount = $('.page').length; // get the total number of tabs
  
    // Hide all tabs except the first one
    $('.page').hide();
    $('.page:first').show();
    $('.prev').hide();
  
    // Event listener for the next button
    $('.next').click(function() {
      // Check if the current tab is valid
      if (currentTab < tabCount) {
        // Hide the current tab
        $('.page').eq(currentTab).hide();
        // Increment the current tab
        currentTab = currentTab + 1;
        // Show the new current tab
        $('.page').eq(currentTab).show();
      }
      // Hide the next button if it's the last tab
      if (currentTab === tabCount - 1) {
        $('.next').hide();
      }
      // Show the previous button
      $('.prev').show();
    });
  
    // Event listener for the previous button
    $('.prev').click(function() {
      // Check if the current tab is valid
      if (currentTab > 0) {
        // Hide the current tab
        $('.page').eq(currentTab).hide();
        // Decrement the current tab
        currentTab = currentTab - 1;
        // Show the new current tab
        $('.page').eq(currentTab).show();
      }
      // Hide the previous button if it's the first tab
      if (currentTab === 0) {
        $('.prev').hide();
      }
      // Show the next button
      $('.next').show();
    });
  });
  