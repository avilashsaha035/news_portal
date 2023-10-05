
<!----Delete All CheckBox---!-->
<script type="text/javascript">
    $(document).ready(function () {
        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))
         {
            $(".sub_chk").prop('checked', true);
         } else {
            $(".sub_chk").prop('checked',false);
         }
        });
        $('.delete_all').on('click', function(e) {
            var allVals = [];
    $(".sub_chk:checked").each(function() {
        allVals.push($(this).attr('data-id'));

    });

  if(allVals.length <=0)
    {
        alert("Please select row.");
    }

    else {
        var check = confirm("Are you sure you want to delete this row?");


        if(check == true){
            var join_selected_values = allVals.join(",");
            $.ajax({
                url: $(this).data('url'),
                type: 'get',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: 'ids='+join_selected_values,
                success: function (data) {
                    if (data['success']) {
                        $(".sub_chk:checked").each(function() {
                            location.reload();


                        });
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });

        }
    }
    });
  });
    </script>
    <!----Deactivate Selected Videos---!-->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#master').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked', false);
                }
            });

            $('.deactivate_all').on('click', function(e) {
                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });

                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {
                    var check = confirm("Are you sure you want to deactivate?");

                    if (check == true) {
                        var join_selected_values = allVals.join(",");
                        $.ajax({
                            url: $(this).data('url'),
                            type: 'get',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: 'ids=' + join_selected_values,
                            success: function(data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function() {
                                        location.reload();
                                    });
                                    alert(data['success']);
                                } else if (data['error']) {
                                    alert(data['error']);
                                } else {
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function(data) {
                                alert(data.responseText);
                            }
                        });
                    }
                }
            });
        });
    </script>

<!----Activate Selected Videos---!-->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#master').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked', false);
                }
            });

            $('.activate_all').on('click', function(e) {
                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });

                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {
                    var check = confirm("Are you sure you want to Activate?");

                    if (check == true) {
                        var join_selected_values = allVals.join(",");
                        $.ajax({
                            url: $(this).data('url'),
                            type: 'get',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: 'ids=' + join_selected_values,
                            success: function(data) {
                                if (data['success']) {
                                 $(".sub_chk:checked").each(function() {
                                 location.reload();
                               });
                            alert(data['success']);
                             location.reload(); // Reload the page
                    } else if (data['error']) {
                                    alert(data['error']);
                                } else {
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function(data) {
                                alert(data.responseText);
                            }
                        });
                    }
                }
            });
        });
    </script>

<!----Delete All CheckBoxes---!-->

<!----PopUp Model Carousel Image---!-->
<script>
    function openModal(modalId, modalImgId, imgElement) {
        var modal = document.getElementById(modalId);
        var modalImg = document.getElementById(modalImgId);
        var closeBtn = modal.getElementsByClassName("close")[0];

        modal.style.display = "block";
        modalImg.src = imgElement.src;

        closeBtn.onclick = function() {
            modal.style.display = "none";
        }
    }
</script>

<!----PopUp Model Carousel Image---!-->

<!----Delete Carousel---!-->
<script>
    $(document).ready(function () {
       $(".del-carousel").click(function () {
           Swal.fire({
 title: 'Are you sure?',
 text: "You won't be able to revert this!",
 icon: 'warning',
 showCancelButton: true,
 confirmButtonColor: '#3085d6',
 cancelButtonColor: '#d33',
 confirmButtonText: 'Yes, delete it!'
}).then((result) => {
 if (result.isConfirmed) {
  var link = $(this).attr('data-link');
  window.location.href = link;
 }
})

       })
   });


</script>
<!----Delete Carousel---!-->


<!----Image Preview---!-->
<script>

    $(document).ready(()=>{
          $('#photo').change(function(){
            const file = this.files[0];
            console.log(file);
            if (file){
              let reader = new FileReader();
              reader.onload = function(event){
                console.log(event.target.result);
                $('#imgPreview').attr('src', event.target.result);
              }
              reader.readAsDataURL(file);
            }
          });
        });
        </script>

<!----Image Preview---!-->

<!----Multiple Preview Images--!!--->
    <script>
    function preview_image() {
      var files = Array.from(document.getElementById("upload_file").files);
      var previewContainer = document.getElementById("image_preview");

      files.forEach(function(file) {
        var previewDiv = document.createElement('div');
        previewDiv.className = 'preview-container';

        var image = document.createElement('img');
        image.src = URL.createObjectURL(file);
        image.className = 'preview-image';
        previewDiv.appendChild(image);

        var cancelBtn = document.createElement('div');
        cancelBtn.textContent = 'Cancel';
        cancelBtn.className = 'cancel-button';
        cancelBtn.addEventListener('click', function() {
          previewDiv.remove();
        });
        previewDiv.appendChild(cancelBtn);

        previewContainer.appendChild(previewDiv);
      });
    }
  </script>
