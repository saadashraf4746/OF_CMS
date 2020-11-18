<script type="text/javascript" src="<?=base_url()?>assets/dist/js/jquery-3.4.1.min.js"></script>
<!-- bootstrap -->
<script type="text/javascript" src="<?=base_url()?>assets/dist/js/popper.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/dist/js/bootstrap.min.js"></script>
<!-- owl carousel -->
<script type="text/javascript" src="<?=base_url()?>assets/dist/js/owl.carousel.min.js"></script>
<!-- wow js -->
<script type="text/javascript" src="<?=base_url()?>assets/dist/js/aos.js"></script>
<!-- custom js code -->
<script type="text/javascript" src="<?=base_url()?>assets/dist/js/custom.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/dist/js/jquery-validation.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/dist/js/field-masking.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background: red">
        <h4 class="modal-title text-center" style="color: white" id="myModalLabel">Confirm Delete</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">&times;</button>
      </div>

      <div class="modal-body">
        <p>You are about to delete, this procedure is irreversible.</p>
        <p>Do you want to proceed?</p>
        <p class="debug-url"></p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a class="btn btn-small text-white btn-ok" style="background: red;color: white">Delete</a>
      </div>
    </div>
  </div>
</div>

<script>
  $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

      //$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
    });
  </script>

<script type="text/javascript">


function dateToDMY(date)
{
  var index = date.split('-');
  return VarNewDate = `${index[2]}-${index[1]}-${index[0]}`;
}
      
$( document ).ready(function() {
  	///MASKINGS
  	//SEASON MASKING
   $(".season-validation").mask('AAAA-AAAA', {'translation': {
    A: {pattern: /[0-9]/}, 
  }
});
    //SEASON MASKING
    $(".phone-validation").mask('AAAA-AAAAAAA', {'translation': {
      A: {pattern: /[0-9]/}, 
    }
  });
    //SEASON MASKING
    $(".CNIC-masking").mask('AAAAA-AAAAAAA-A', {'translation': {
      A: {pattern: /[0-9]/}, 
    }
  });
    //SEASON MASKING
    $(".numeric-masking").mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {'translation': {
      A: {pattern: /[0-9]/}, 
    }
  });
    //SEASON MASKING
    $(".acre-masking").mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {'translation': {
      A: {pattern: /[0-9.]/}, 
    }
  });

  //Amount masking
  $('.amount').mask('00000000,00,00,000.00', {reverse: true});

  // Date Masking
  $('.date-masking').mask('00-00-0000', {placeholder: "DD-MM-YYYY"});

	//FORM VALIDATIONS
    //ADD SEASON VALIDATION
    $('#startSeasonForm').validate({
      errorElement: "span",
      errorClass: "error",
      rules: 
      {
        seasonYear: 
        {
          required: true,
          minlength: 9
        }
      },
      messages:
      {
        seasonYear:
        {
          required: "Please enter season",
          minlength: "Please enter valid season"
        }
      }
    });
    //ADD SEASON VALIDATION
    $('#gardenAddEdit').validate({
      errorElement: "span",
      errorClass: "error",
      rules: 
      {
        landlordName: 
        {
          required: true,
          lettersonly:true
        },
        landlordPhone: 
        {
          required: true
        },
        landlordCNIC: 
        {
          required: true
        },
        distirctCity: 
        {
          required: true,
          lettersonlyPro:true
        },
        gardenLocation: 
        {
          required: true
        },
        gardenAcre: 
        {
          required: true
        },
        endDate: 
        {
          required: true
        },
        jinasValue: 
        {
          required: true
        }
      },
      messages:
      {
        landlordName:
        {
          required: "Please enter landlord name"
        },
        landlordPhone:
        {
          required: "Please enter landlord phone"
        },
        landlordCNIC:
        {
          required: "Please enter landlord CNIC"
        },
        distirctCity:
        {
          required: "Please enter district , city"
        },
        gardenLocation:
        {
          required: "Please enter garden location"
        },
        gardenAcre:
        {
          required: "Please enter garden acre"
        },
        endDate:
        {
          required: "Please enter end date"
        },
        jinasValue:
        {
          required: "Please enter jinas quantity"
        },
      }
    });
    //ADD SEASON VALIDATION
    $('#bayanaForm').validate({
      errorElement: "span",
      errorClass: "error",
      rules: 
      {
        bayanaAmount: 
        {
          required: true
        }
      },
      messages:
      {
        bayanaAmount:
        {
          required: "Please enter amount of bayana"
        }
      }
    });
    //ADD SEASON VALIDATION
    $('#installmentForm').validate({
      errorElement: "span",
      errorClass: "error",
      rules: 
      {
        installmentAmount: 
        {
          required: true
        }
      },
      messages:
      {
        installmentAmount:
        {
          required: "Please enter amount of intallment"
        }
      }
    });

    //ADD SEASON VALIDATION
    $('#addExpenseTransport').validate({
      errorElement: "span",
      errorClass: "error",
      rules: 
      {
        ownerName: 
        {
          required: true,
          lettersonly:true
        },
        ownerMobile: 
        {
          required: true
        },
        driverName: 
        {
          required: true,
          lettersonly:true
        },
        driverNumber: 
        {
          required: true
        },
        transportNumber: 
        {
          required: true
        },
        expenseAmount: 
        {
          required: true
        },
        expenseDescription: 
        {
          required: true
        }
      },
      messages:
      {
        ownerName:
        {
          required: "Please enter owner name"
        },
        ownerMobile:
        {
          required: "Please enter owner mobile"
        },
        driverName:
        {
          required: "Please enter driver name"
        },
        driverNumber:
        {
          required: "Please enter driver number"
        },
        transportNumber:
        {
          required: "Please enter transport number"
        },
        expenseAmount:
        {
          required: "Please enter expense amount"
        },
        expenseDescription:
        {
          required: "Please enter expense description"
        }
      }
    });

    //ADD OTHER EXPENSE VALIDATION
    $('#addOtherExpense').validate({
      errorElement: "span",
      errorClass: "error",
      rules: 
      {
        expenseTittle: 
        {
          required: true,
          lettersonly:true
        },
        expenseAmount: 
        {
          required: true
        },
        expenseDescription: 
        {
          required: true
        }
      },
      messages:
      {
        expenseTittle:
        {
          required: "Please enter expense tittle"
        },
        expenseAmount:
        {
          required: "Please enter expense amount"
        },
        expenseDescription:
        {
          required: "Please enter expense description"
        }
      }
    });
    
  /// ADTIONAL METHODS
  jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z ]+$/i.test(value);
  }, "Letters only please"); 
  jQuery.validator.addMethod("lettersonlyPro", function(value, element) {
    return this.optional(element) || /^[a-z ,.]+$/i.test(value);
  }, "Letters only please"); 

  //
});

$(document).ready( function () {
  $('.datatable').DataTable({
    stateSave: true
  });
} );
  //STICKY FOOTER
      // FIXED ON SCROLLING
    var sticky = $('.sticky').offset().top;       // get initial position of the element
    $(window).scroll(function() 
    {                  // assign scroll event listener
        var currentScroll = $(window).scrollTop(); // get current position
        if (currentScroll >= sticky) 
        { 
          $('.sticky').css({
            'position':'-webkit-sticky',
            'position': 'sticky',
            'top' : '0',
            'background-color':'white',
            'z-index':'999',
            'padding-top':'10px',
            'box-shadow':'0px 2px 16px #0003',
            'margin-bottom':'10px'
          });
        }
      });
  //scroll to top
  $('.scroll-top').on("click",function(){
    $('html, body').animate({scrollTop:0}, 'fast');
    return false;
  });
// REMOVE COMMA
function removeCommas(str) {
    while (str.search(",") >= 0) {
        str = (str + "").replace(',', '');
    }
    return str;
};


  function seprator(input) { 
    let nums = input.value.replace(/,/g, '');
    if(!nums || nums.endsWith('.'))  return;
    input.value = parseFloat(nums).toLocaleString(); 

  }

  
function convertNumberToWords(amount) {
    var words = new Array();
    words[0] = '';
    words[1] = 'One';
    words[2] = 'Two';
    words[3] = 'Three';
    words[4] = 'Four';
    words[5] = 'Five';
    words[6] = 'Six';
    words[7] = 'Seven';
    words[8] = 'Eight';
    words[9] = 'Nine';
    words[10] = 'Ten';
    words[11] = 'Eleven';
    words[12] = 'Twelve';
    words[13] = 'Thirteen';
    words[14] = 'Fourteen';
    words[15] = 'Fifteen';
    words[16] = 'Sixteen';
    words[17] = 'Seventeen';
    words[18] = 'Eighteen';
    words[19] = 'Nineteen';
    words[20] = 'Twenty';
    words[30] = 'Thirty';
    words[40] = 'Forty';
    words[50] = 'Fifty';
    words[60] = 'Sixty';
    words[70] = 'Seventy';
    words[80] = 'Eighty';
    words[90] = 'Ninety';
    amount = amount.toString();
    var atemp = amount.split(".");
    var number = atemp[0].split(",").join("");
    var n_length = number.length;
    var words_string = "";
    if (n_length <= 9) {
        var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        var received_n_array = new Array();
        for (var i = 0; i < n_length; i++) {
            received_n_array[i] = number.substr(i, 1);
        }
        for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
            n_array[i] = received_n_array[j];
        }
        for (var i = 0, j = 1; i < 9; i++, j++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                if (n_array[i] == 1) {
                    n_array[j] = 10 + parseInt(n_array[j]);
                    n_array[i] = 0;
                }
            }
        }
        value = "";
        for (var i = 0; i < 9; i++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                value = n_array[i] * 10;
            } else {
                value = n_array[i];
            }
            if (value != 0) {
                words_string += words[value] + " ";
            }
            if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Crores ";
            }
            if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Lakhs ";
            }
            if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Thousand ";
            }
            if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                words_string += "Hundred and ";
            } else if (i == 6 && value != 0) {
                words_string += "Hundred ";
            }
        }
        words_string = words_string.split("  ").join(" ");
    }
    return words_string;
}

function withDecimal(n, errorId) {
    var nums = n.toString().replace(/,/g, '').split('.')
    var whole = convertNumberToWords(nums[0])
    if (nums.length == 2) {
        var fraction = convertNumberToWords(nums[1])
        document.getElementById(errorId).style.display = 'block';
        document.getElementById(errorId).innerHTML = `${whole} Point ${fraction}`;
    } else {
        document.getElementById(errorId).style.display = 'block';
        document.getElementById(errorId).innerHTML = `${whole}`;
    }
}

function withDecimalOnlyWords(n, errorId) {
    var nums = n.toString().replace(/,/g, '').split('.')
    var whole = convertNumberToWords(nums[0])
    if (nums.length == 2) {
        var fraction = convertNumberToWords(nums[1])
        return `${whole} Point ${fraction}`;
    } else {
        return `${whole}`;
    }
}

</script>

<!-- REFRESH BACK TO SAE SCROLL -->
