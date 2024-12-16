    let rate = document.getElementById('rate');
    let Interviews_rate = document.getElementById('Interviews_rate');
    let IQ_test = document.getElementById('IQ');
    let arabic = document.getElementById('arabic');
    let science = document.getElementById('science');
    let mathematics = document.getElementById('mathematics');
    let english = document.getElementById('english');
    let total_materials = document.getElementById('total_materials');
    let total_materials_rate = document.getElementById('total_materials_rate');
    let total = document.getElementById('total');
    let result = document.getElementById('result');
    let applicant_id = document.getElementById('applicant_id');
    let student_id_resident = document.getElementById('student_id_resident');
    let behaver = document.getElementById('behaver');
    let behaver_rate = document.getElementById('behaverRate');
    

    function getTotal_materials(){
        let result_materials = +IQ_test.value + +arabic.value + +science.value + +mathematics.value
            + +english.value ;

        total_materials.value = result_materials;

    }
   

        function getBehaverRate(){
        let result =  +behaver.value / 10;
        behaverRate.value = result;
        }

    
    


