function pagination(pages, page) {
    changePage(page);
    let str = '<ul>';
    let active;
    let pageCutLow = page - 1;
    let pageCutHigh = page + 1;
    // Previous page button
    if (page > 1) {
      str += '<li class="page-item previous no"><a onclick="pagination('+pages+', '+(page-1)+')">Previous</a></li>';
    }
    // Show all the pagination elements
    if (pages < 6) {
      for (let p = 1; p <= pages; p++) {
        active = page == p ? "active" : "no";
        str += '<li class="'+active+'"><a onclick="pagination('+pages+', '+p+')">'+ p +'</a></li>';
      }
    }
    else {
      // First page
      if (page > 2) {
        str += '<li class="no page-item"><a onclick="pagination('+pages+', 1)">1</a></li>';
        if (page > 3) {
            str += '<li class="out-of-range"><a onclick="pagination('+pages+','+(page-2)+')">...</a></li>';
        }
      }
      // Determine how many pages to show after the current page index
      if (page === 1) {
        pageCutHigh += 2;
      } else if (page === 2) {
        pageCutHigh += 1;
      }
      // Determine how many pages to show before the current page index
      if (page === pages) {
        pageCutLow -= 2;
      } else if (page === pages-1) {
        pageCutLow -= 1;
      }
      // Output the indexes for pages that fall inside the range of pageCutLow
      // and pageCutHigh
      for (let p = pageCutLow; p <= pageCutHigh; p++) {
        if (p === 0) {
          p += 1;
        }
        if (p > pages) {
          continue
        }
        active = page == p ? "active" : "no";
        str += '<li class="page-item '+active+'"><a onclick="pagination('+pages+', '+p+')">'+ p +'</a></li>';
      }
      // section (before the Next button)
      if (page < pages-1) {
        if (page < pages-2) {
          str += '<li class="out-of-range"><a onclick="pagination('+pages+','+(page+2)+')">...</a></li>';
        }
        str += '<li class="page-item no"><a onclick="pagination('+pages+', '+pages+')">'+pages+'</a></li>';
      }
    }
    // Next page button 
    if (page < pages) {
      str += '<li class="page-item next no"><a onclick="pagination('+pages+', '+(page+1)+')">Next</a></li>';
    }
    str += '</ul>';
    // Return the pagination string
    document.getElementById('pagination').innerHTML = str;
    return str;
  }