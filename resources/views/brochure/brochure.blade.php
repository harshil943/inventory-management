@extends('layouts.app')

@section('title')
    Brochure Details | Bright Containers
@endsection

@section('content')
<br>
    <div class="text-center pdf-toolbar">
        <div class="btn-group">
            <button id="prev" class="btn btn-white"><i class="fa fa-long-arrow-left"></i> <span class="hidden-xs">Previous</span></button>
            <button id="next" class="btn btn-white"><i class="fa fa-long-arrow-right"></i> <span class="hidden-xs">Next</span></button>
            <button id="zoomin" class="btn btn-white"><i class="fa fa-search-minus"></i> <span class="hidden-xs">Zoom In</span></button>
            <button id="zoomout" class="btn btn-white"><i class="fa fa-search-plus"></i> <span class="hidden-xs">Zoom Out</span> </button>
            <button id="zoomfit" class="btn btn-white"> 100%</button>
            <span class="btn btn-white hidden-xs">Page: </span>
            <div class="input-group">
                <input type="text" class="form-control" id="page_num">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-white" id="page_count"></button>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center m-t-md">
        <canvas id="the-canvas" class="pdfcanvas border-left-right border-top-bottom b-r-md"></canvas>
    </div>
@endsection

@push('script')
<script src="{{asset('js/plugins/pdfjs/pdf.js')}}"></script>
<script>

    var url = "{{asset('brochures/example.pdf')}}";

    var pdfDoc = null,
            pageNum = 1,
            pageRendering = false,
            pageNumPending = null,
            scale = 1,
            zoomRange = 0.25,
            canvas = document.getElementById('the-canvas'),
            ctx = canvas.getContext('2d');

    /**
     * Get page info from document, resize canvas accordingly, and render page.
     * @param num Page number.
     */
    function renderPage(num, scale) {
        pageRendering = true;
        // Using promise to fetch the page
        pdfDoc.getPage(num).then(function(page) {
            var viewport = page.getViewport(scale);
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            // Render PDF page into canvas context
            var renderContext = {
                canvasContext: ctx,
                viewport: viewport
            };
            var renderTask = page.render(renderContext);

            // Wait for rendering to finish
            renderTask.promise.then(function () {
                pageRendering = false;
                if (pageNumPending !== null) {
                    // New page rendering is pending
                    renderPage(pageNumPending);
                    pageNumPending = null;
                }
            });
        });

        // Update page counters
        document.getElementById('page_num').value = num;
    }

    /**
     * If another page rendering in progress, waits until the rendering is
     * finised. Otherwise, executes rendering immediately.
     */
    function queueRenderPage(num) {
        if (pageRendering) {
            pageNumPending = num;
        } else {
            renderPage(num,scale);
        }
    }

    /**
     * Displays previous page.
     */
    function onPrevPage() {
        if (pageNum <= 1) {
            return;
        }
        pageNum--;
        var scale = pdfDoc.scale;
        queueRenderPage(pageNum, scale);
    }
    document.getElementById('prev').addEventListener('click', onPrevPage);

    /**
     * Displays next page.
     */
    function onNextPage() {
        if (pageNum >= pdfDoc.numPages) {
            return;
        }
        pageNum++;
        var scale = pdfDoc.scale;
        queueRenderPage(pageNum, scale);
    }
    document.getElementById('next').addEventListener('click', onNextPage);

    /**
     * Zoom in page.
     */
    function onZoomIn() {
        if (scale >= pdfDoc.scale) {
            return;
        }
        scale += zoomRange;
        var num = pageNum;
        renderPage(num, scale)
    }
    document.getElementById('zoomin').addEventListener('click', onZoomIn);

    /**
     * Zoom out page.
     */
    function onZoomOut() {
        if (scale >= pdfDoc.scale) {
            return;
        }
        scale -= zoomRange;
        var num = pageNum;
        queueRenderPage(num, scale);
    }
    document.getElementById('zoomout').addEventListener('click', onZoomOut);

    /**
     * Zoom fit page.
     */
    function onZoomFit() {
        if (scale >= pdfDoc.scale) {
            return;
        }
        scale = 1;
        var num = pageNum;
        queueRenderPage(num, scale);
    }
    document.getElementById('zoomfit').addEventListener('click', onZoomFit);


    /**
     * Asynchronously downloads PDF.
     */
    PDFJS.getDocument(url).then(function (pdfDoc_) {
        pdfDoc = pdfDoc_;
        var documentPagesNumber = pdfDoc.numPages;
        document.getElementById('page_count').textContent = '/ ' + documentPagesNumber;

        $('#page_num').on('change', function() {
            var pageNumber = Number($(this).val());

            if(pageNumber > 0 && pageNumber <= documentPagesNumber) {
                queueRenderPage(pageNumber, scale);
            }

        });

        // Initial/first page rendering
        renderPage(pageNum, scale);
    });
</script>
    <script>
        $(function() {
            $('.product').addClass('active');
            $('.product').addClass('btn-rounded');
            $('.product').addClass('blue-bg');
            $(".product .nav-link").css("color","#fff");
        });
    </script>
@endpush
