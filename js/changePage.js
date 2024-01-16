function changePage(page) {
    const startIndex = (page - 1) * recordsPerPage;
    const endIndex = startIndex + recordsPerPage;
    let pageRecords;
    // if filter data or searched input not empty 
    if(filteredTasks.length > 0 || document.getElementById('searchInput').value){
      console.log(filteredTasks.length)
      pageRecords = filteredTasks.slice(startIndex, endIndex);
    }else {
      pageRecords = tasks.slice(startIndex, endIndex);
    }
    appendTable(pageRecords);
    
    currentPage = page;
}