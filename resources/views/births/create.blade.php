@extends('layouts.app')

@section('content')
<style>
    /* =======================================================
       BULLETPROOF FORM 102 GRID SYSTEM
       Matches your exact Bootstrap 4 legacy layout proportions
       ======================================================= */

    .form-102-wrapper { width: 960px; margin: 0 auto; font-family: Arial, sans-serif; color: #000; background: white; }

    /* Rigid Flex Grid (Replicating Bootstrap col-1 to col-12) */
    .f-row { display: flex; width: 100%; flex-wrap: wrap; }
    .c-1 { width: 8.333333%; flex-shrink: 0; }
    .c-2 { width: 16.666667%; flex-shrink: 0; }
    .c-3 { width: 25%; flex-shrink: 0; }
    .c-4 { width: 33.333333%; flex-shrink: 0; }
    .c-5 { width: 41.666667%; flex-shrink: 0; }
    .c-6 { width: 50%; flex-shrink: 0; }
    .c-7 { width: 58.333333%; flex-shrink: 0; }
    .c-8 { width: 66.666667%; flex-shrink: 0; }
    .c-9 { width: 75%; flex-shrink: 0; }
    .c-10 { width: 83.333333%; flex-shrink: 0; }
    .c-12 { width: 100%; flex-shrink: 0; }

    .pad-inner { padding: 2px 6px; }

    /* Exact Green Borders */
    .br-green { border: 2px solid #008000; }
    .border-b-green { border-bottom: 2px solid #008000; }
    .border-r-green { border-right: 2px solid #008000; }
    .border-t-green { border-top: 2px solid #008000; }

    /* Input Styling */
    .f-input {
        border: 1px solid #ced4da; border-radius: 3px; padding: 2px 5px;
        font-size: 10px !important; width: 100%; text-transform: uppercase;
        height: 24px; outline: none; background: #fff;
    }
    .f-input:focus { border-color: #80bdff; box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25); }

    .f-input-cyan { background-color: #7FFFD4 !important; border: none !important; }
    .f-bg-grey { background-color: #cccccc; }

    .f-label-green { color: #008000; font-size: 10px; display: block; text-align: center; }
    .f-h6 { font-size: 10px; font-weight: bold; margin: 0; padding-top: 2px; }

    /* Vertical text blocks */
    .v-text {
        writing-mode: vertical-rl; text-orientation: upright;
        text-align: center; width: 34px; font-size: 14px;
        font-weight: bold; letter-spacing: 4px; padding-top: 20px;
        flex-shrink: 0;
    }

    .input-addon {
        display: flex; align-items: center; background: white;
        font-size: 10px; border: none; white-space: nowrap;
    }

    .btn-outline-info { border: 1px solid #17a2b8; color: #17a2b8; background: white; padding: 8px 24px; border-radius: 4px; font-weight: bold; cursor: pointer; }
    .btn-outline-info:hover, .btn-outline-info.active { background: #17a2b8; color: white; }
</style>

<div class="w-full py-6">
    <div class="mb-4 flex gap-2 max-w-[960px] mx-auto">
        <button type="button" id="p1" class="btn-outline-info active" onclick="showP('page1')">Page 1</button>
        <button type="button" id="p2" class="btn-outline-info" onclick="showP('page2')">Page 2</button>
    </div>

    <form method="POST" action="{{ route('births.store') }}" id="addbirth_form">
        @csrf

        <div class="form-102-wrapper mb-8">
            <div id="page1">

                <div class="f-row">
                    <div class="c-9 br-green p-3 text-center h-[120px]">
                        <p class="text-[10px] text-left mb-0">Municipal Form No. 102</p>
                        <p class="text-[12px] mb-0 mt-2">Republic of the Philippines</p>
                        <p class="text-[10px] mb-1">OFFICE OF THE CIVIL REGISTRAR GENERAL</p>
                        <h1 class="text-[24px] font-bold mt-1 tracking-wide">CERTIFICATE OF LIVE BIRTH</h1>
                    </div>
                    <div class="c-3 br-green !border-l-0 !border-b-0 f-bg-grey p-2 flex flex-col justify-between h-[120px]">
                        <div><span class="f-h6 block mb-[2px]">Book No.</span><input type="text" class="f-input f-input-cyan"></div>
                        <div><span class="f-h6 block mb-[2px]">Page No.</span><input type="text" class="f-input f-input-cyan"></div>
                    </div>
                </div>

                <div class="f-row">
                    <div class="c-9 br-green !border-t-0 flex flex-col justify-center py-1">
                        <div class="flex items-center px-2 py-[2px]"><span class="text-[10px] w-[120px]">Province</span><div class="flex-grow"><input type="text" class="f-input" value="TARLAC"></div></div>
                        <div class="flex items-center px-2 py-[2px]"><span class="text-[10px] w-[120px]">City/Municipality</span><div class="flex-grow"><input type="text" class="f-input" value="GERONA"></div></div>
                    </div>
                    <div class="c-3 br-green !border-l-0 !border-t-0 f-bg-grey p-2 flex flex-col justify-end">
                        <span class="f-h6 block mb-[2px]">Registry No.</span><input type="text" name="registry_number" class="f-input f-input-cyan" required>
                    </div>
                </div>

                <div class="f-row br-green !border-t-0">
                    <div class="v-text border-r-green">CHILD</div>
                    <div style="width: calc(100% - 34px);" class="flex flex-col">
                        <div class="f-row border-b-green pad-inner items-end">
                            <div class="c-1"><h6 class="f-h6">1. NAME</h6></div>
                            <div class="c-4 px-1"><span class="f-label-green">(First)</span><input type="text" name="first_name" class="f-input text-center"></div>
                            <div class="c-4 px-1"><span class="f-label-green">(Middle)</span><input type="text" name="middle_name" class="f-input text-center"></div>
                            <div class="c-3 px-1"><span class="f-label-green">(Last)</span><input type="text" name="last_name" class="f-input text-center"></div>
                        </div>
                        <div class="f-row border-b-green items-end">
                            <div class="c-3 border-r-green pad-inner pb-1">
                                <h6 class="f-h6">2. SEX <span class="f-label-green inline font-normal">(Male/Female)</span></h6>
                                <select name="sex" class="f-input mt-1"><option value="Male">Male</option><option value="Female">Female</option></select>
                            </div>
                            <div class="c-2 pad-inner"><h6 class="f-h6">3. DATE OF<br>&emsp;BIRTH</h6></div>
                            <div class="c-7 pad-inner pr-2">
                                <div class="f-row"><span class="f-label-green c-4">(Day)</span><span class="f-label-green c-4">(Month)</span><span class="f-label-green c-4">(Year)</span></div>
                                <div class="f-row bg-[#e9ecef] overflow-hidden" style="height:24px;">
                                    <input type="text" class="c-4 bg-transparent border-none text-center outline-none text-[10px]"><input type="text" class="c-4 bg-transparent border-none text-center outline-none text-[10px]"><input type="text" class="c-4 bg-transparent border-none text-center outline-none text-[10px]">
                                </div>
                            </div>
                        </div>
                        <div class="f-row border-b-green pad-inner items-end pb-1">
                            <div class="c-2"><h6 class="f-h6">4. PLACE OF <br>&emsp;BIRTH</h6></div>
                            <div class="c-4 px-1"><span class="f-label-green text-left mb-[2px]">(Name of Hospital/Clinic/Institution/<br>House No.,St.,Barangay)</span><input type="text" name="place_of_birth" class="f-input"></div>
                            <div class="c-3 px-1"><span class="f-label-green text-left mb-[2px]">(City/Municipality)</span><input type="text" class="f-input"></div>
                            <div class="c-3 px-1"><span class="f-label-green text-left mb-[2px]">(Province)</span><input type="text" class="f-input"></div>
                        </div>
                        <div class="f-row pad-inner items-end pb-1">
                            <div class="c-3 border-r-green pr-1"><h6 class="f-h6">5a. TYPE OF BIRTH<br>&emsp;&nbsp;&nbsp;<span class="f-label-green inline font-normal">(Single, Twin, Triplet, etc.)</span></h6><input type="text" class="f-input text-center mt-1"></div>
                            <div class="c-3 border-r-green px-1"><h6 class="f-h6">5b. IF MULTIPLE BIRTH, CHILD WAS<br>&emsp;&nbsp;&nbsp;<span class="f-label-green inline font-normal">(First, Second, Third, etc.)</span></h6><input type="text" class="f-input text-center mt-1"></div>
                            <div class="c-3 border-r-green px-1"><h6 class="f-h6">5c. BIRTH ORDER <span class="f-label-green inline font-normal">(Order of this birth to previous live births...)</span></h6><input type="text" class="f-input text-center mt-1"></div>
                            <div class="c-3 pl-1"><h6 class="f-h6">6. WEIGHT OF BIRTH</h6><div class="flex items-center mt-3"><input type="text" name="weight" class="f-input text-center flex-grow"><span class="text-[10px] ml-1">grams</span></div></div>
                        </div>
                    </div>
                </div>

                <div class="f-row br-green !border-t-0">
                    <div class="v-text border-r-green">MOTHER</div>
                    <div style="width: calc(100% - 34px);" class="flex flex-col">
                        <div class="f-row border-b-green pad-inner items-end pb-1">
                            <div class="c-1"><h6 class="f-h6">7. MAIDEN<br>&nbsp;&nbsp;&nbsp;&nbsp;NAME</h6></div>
                            <div class="c-4 px-1"><span class="f-label-green">(First)</span><input type="text" name="mother_first_name" class="f-input text-center"></div>
                            <div class="c-4 px-1"><span class="f-label-green">(Middle)</span><input type="text" class="f-input text-center"></div>
                            <div class="c-3 px-1"><span class="f-label-green">(Last)</span><input type="text" name="mother_last_name" class="f-input text-center"></div>
                        </div>
                        <div class="f-row border-b-green pad-inner pb-1">
                            <div class="c-6 border-r-green pr-2"><h6 class="f-h6">8. CITIZENSHIP</h6><input type="text" class="f-input mt-1" value="FILIPINO"></div>
                            <div class="c-6 pl-2"><h6 class="f-h6">9. RELIGION/RELIGIOUS SECT</h6><input type="text" class="f-input mt-1"></div>
                        </div>
                        <div class="f-row border-b-green pad-inner pb-1">
                            <div class="c-2 border-r-green pr-1"><h6 class="f-h6">10a. <span class="font-normal">Total number of children born alive</span></h6><input type="text" class="f-input text-center mt-1"></div>
                            <div class="c-2 border-r-green px-1"><h6 class="f-h6">10b. <span class="font-normal">No. of children still living...</span></h6><input type="text" class="f-input text-center mt-1"></div>
                            <div class="c-2 border-r-green px-1"><h6 class="f-h6">10c. <span class="font-normal">No. of children born alive but...</span></h6><input type="text" class="f-input text-center mt-1"></div>
                            <div class="c-4 border-r-green px-1"><h6 class="f-h6">11. OCCUPATION</h6><input type="text" class="f-input text-center mt-[14px]"></div>
                            <div class="c-2 pl-1"><h6 class="f-h6">12. <span class="font-normal">AGE at time of this birth</span> <span class="f-label-green inline">(completed years)</span></h6><input type="text" class="f-input text-center mt-1"></div>
                        </div>
                        <div class="f-row pad-inner items-end pb-1">
                            <div class="c-1"><h6 class="f-h6">13. RESIDENCE</h6></div>
                            <div class="c-4 pl-6 pr-1"><span class="f-label-green text-left mb-[2px]">(House No.,St.,Barangay)</span><input type="text" class="f-input text-center"></div>
                            <div class="c-3 px-1"><span class="f-label-green text-left mb-[2px]">(City/Municipality)</span><input type="text" class="f-input text-center"></div>
                            <div class="c-2 px-1"><span class="f-label-green text-left mb-[2px]">(Province)</span><input type="text" class="f-input text-center"></div>
                            <div class="c-2 pl-1"><span class="f-label-green text-left mb-[2px]">(Country)</span><input type="text" class="f-input text-center"></div>
                        </div>
                    </div>
                </div>

                <div class="f-row br-green !border-t-0">
                    <div class="v-text border-r-green">FATHER</div>
                    <div style="width: calc(100% - 34px);" class="flex flex-col">
                        <div class="f-row border-b-green pad-inner items-end pb-1">
                            <div class="c-1"><h6 class="f-h6">14. NAME</h6></div>
                            <div class="c-4 px-1"><span class="f-label-green">(First)</span><input type="text" class="f-input text-center"></div>
                            <div class="c-4 px-1"><span class="f-label-green">(Middle)</span><input type="text" class="f-input text-center"></div>
                            <div class="c-3 px-1"><span class="f-label-green">(Last)</span><input type="text" class="f-input text-center"></div>
                        </div>
                        <div class="f-row border-b-green pad-inner pb-1">
                            <div class="c-3 border-r-green pr-2"><h6 class="f-h6">15. CITIZENSHIP</h6><input type="text" class="f-input text-center mt-1"></div>
                            <div class="c-4 border-r-green px-2"><h6 class="f-h6">16. RELIGION/RELIGIOUS SECT</h6><input type="text" class="f-input text-center mt-1"></div>
                            <div class="c-3 border-r-green px-2"><h6 class="f-h6">17. OCCUPATION</h6><input type="text" class="f-input text-center mt-1"></div>
                            <div class="c-2 pl-2"><h6 class="f-h6">18. <span class="font-normal">AGE <span class="f-label-green inline">(completed years)</span></span></h6><input type="text" class="f-input text-center mt-1"></div>
                        </div>
                        <div class="f-row pad-inner items-end pb-1">
                            <div class="c-1"><h6 class="f-h6">19. RESIDENCE</h6></div>
                            <div class="c-4 pl-6 pr-1"><span class="f-label-green text-left mb-[2px]">(House No.,St.,Barangay)</span><input type="text" class="f-input text-center"></div>
                            <div class="c-3 px-1"><span class="f-label-green text-left mb-[2px]">(City/Municipality)</span><input type="text" class="f-input text-center"></div>
                            <div class="c-2 px-1"><span class="f-label-green text-left mb-[2px]">(Province)</span><input type="text" class="f-input text-center"></div>
                            <div class="c-2 pl-1"><span class="f-label-green text-left mb-[2px]">(Country)</span><input type="text" class="f-input text-center"></div>
                        </div>
                    </div>
                </div>

                <div class="f-row br-green !border-t-0 p-2">
                    <div class="c-12"><h6 class="f-h6">MARRIAGE OF PARENTS <span class="font-normal">(If not married, accomplish Affidavit of Acknowledgement/Admission of Paternity at the back.)</span></h6></div>
                    <div class="c-12 f-row border-t-green mt-1 pt-1">
                        <div class="c-1"><h6 class="f-h6">20a. DATE</h6></div>
                        <div class="c-3 px-1">
                            <div class="f-row"><span class="f-label-green c-4">(Month)</span><span class="f-label-green c-4">(Day)</span><span class="f-label-green c-4">(Year)</span></div>
                            <input type="text" class="f-input text-center mt-[2px]" style="word-spacing: 2em;">
                        </div>
                        <div class="c-1 border-l-green pl-2"><h6 class="f-h6">20b. PLACE</h6></div>
                        <div class="c-7 px-1">
                            <div class="f-row"><span class="f-label-green c-4">(City/Municipality)</span><span class="f-label-green c-4">(Province)</span><span class="f-label-green c-4">(Country)</span></div>
                            <div class="f-row mt-[2px] border border-[#ced4da] rounded-[3px] bg-white h-[24px]">
                                <input type="text" class="c-4 bg-transparent border-none text-center outline-none text-[10px]"><input type="text" class="c-4 bg-transparent border-none text-center outline-none text-[10px]"><input type="text" class="c-4 bg-transparent border-none text-center outline-none text-[10px]">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="f-row br-green !border-t-0 p-2">
                    <div class="c-12"><h6 class="f-h6">21a. ATTENDANT</h6></div>
                    <div class="c-12 flex gap-4 mt-1">
                        <label class="text-[10px]"><input type="checkbox"> 1 Physician</label>
                        <label class="text-[10px]"><input type="checkbox"> 2 Nurse</label>
                        <label class="text-[10px]"><input type="checkbox"> 3 Midwife</label>
                        <label class="text-[10px]"><input type="checkbox"> 4 Hilot (Traditional)</label>
                        <label class="text-[10px]"><input type="checkbox"> 5 Others (Specify)</label>
                        <input type="text" class="f-input w-48 !h-5 !py-0">
                    </div>
                </div>

                <div class="f-row br-green !border-t-0 p-2">
                    <div class="c-12"><h6 class="f-h6 mb-1">21b. CERTIFICATION OF ATTENDANT AT BIRTH <span class="f-label-green inline font-normal">(Physician, Nurse, Midwife, etc.)</span></h6></div>
                    <div class="c-12"><p class="text-[10px] m-0 pl-8">I hereby certify that I attended the birth of the child who was born alive at <input type="time" class="f-input !inline-block w-24"> am/pm on the date of birth specified above.</p></div>

                    <div class="c-6 pr-4 mt-2">
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Signature</span><input type="text" class="f-input !border-t-0 !border-l-0 !border-r-0 !border-b-green !rounded-none"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Name in Print</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Title or Position</span><input type="text" class="f-input"></div>
                    </div>
                    <div class="c-6 pl-4 mt-2">
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Address</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24"></span><input type="text" class="f-input !border-t-0 !border-l-0 !border-r-0 !border-b-green !rounded-none"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Date</span><input type="text" class="f-input"></div>
                    </div>
                </div>

                <div class="f-row br-green !border-t-0 p-2">
                    <div class="c-6 border-r-green pr-4">
                        <h6 class="f-h6">22. CERTIFICATION OF INFORMANT</h6>
                        <p class="text-[10px] m-0 pl-8 mb-2">I hereby certify that all information supplied are true and correct to my own knowledge and belief.</p>
                        <div class="flex items-center mb-1"><span class="input-addon w-28">Signature</span><input type="text" class="f-input !border-t-0 !border-l-0 !border-r-0 !border-b-green !rounded-none"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-28">Name in Print</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-28">Relationship to Child</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-28">Address</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-28">Date</span><input type="text" class="f-input"></div>
                    </div>
                    <div class="c-6 pl-4">
                        <h6 class="f-h6 mb-6">23. PREPARED BY</h6>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Signature</span><input type="text" class="f-input !border-t-0 !border-l-0 !border-r-0 !border-b-green !rounded-none"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Name in Print</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Title or Position</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Date</span><input type="text" class="f-input"></div>
                    </div>
                </div>

                <div class="f-row br-green !border-t-0 p-2">
                    <div class="c-6 border-r-green pr-4">
                        <h6 class="f-h6 mb-2">24. RECEIVED BY</h6>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Signature</span><input type="text" class="f-input !border-t-0 !border-l-0 !border-r-0 !border-b-green !rounded-none"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Name in Print</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Title or Position</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Date</span><input type="text" class="f-input"></div>
                    </div>
                    <div class="c-6 pl-4">
                        <h6 class="f-h6 mb-2">25. REGISTERED AT THE OFFICE OF THE CIVIL REGISTRAR</h6>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Signature</span><input type="text" class="f-input !border-t-0 !border-l-0 !border-r-0 !border-b-green !rounded-none"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Name in Print</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Title or Position</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Date</span><input type="text" class="f-input"></div>
                    </div>
                </div>

                <div class="f-row br-green !border-t-0 p-2">
                    <div class="c-12">
                        <h6 class="f-h6 mb-1">REMARKS/ANNOTATIONS (For LCRO/OCRG Use Only)</h6>
                        <textarea class="w-full border border-gray-300 rounded p-2 text-[10px] uppercase outline-none focus:border-blue-500" rows="3"></textarea>
                    </div>
                </div>

                <div class="f-row br-green !border-t-0 p-2 pb-4">
                    <div class="c-12">
                        <h6 class="f-h6 mb-1">TO BE FILLED-UP AT THE OFFICE OF THE CIVIL REGISTRAR</h6>
                        <p class="text-[10px] font-bold tracking-[1.8em] m-0 pl-1">8 9 11 13 15 16 17 19</p>
                        <div class="flex gap-1 mt-1">
                            <input type="text" class="f-input w-8"><input type="text" class="f-input w-8">
                            <input type="text" class="f-input w-8 ml-2"><input type="text" class="f-input w-8">
                            <input type="text" class="f-input w-8 ml-2"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8">
                            <input type="text" class="f-input w-8 ml-2"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8">
                            <input type="text" class="f-input w-8 ml-2"><input type="text" class="f-input w-8">
                            <input type="text" class="f-input w-8 ml-2"><input type="text" class="f-input w-8">
                            <input type="text" class="f-input w-8 ml-2"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8">
                            <input type="text" class="f-input w-8 ml-2"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8">
                        </div>
                    </div>
                </div>

            </div> <div id="page2" class="hidden p-4">
                <div class="br-green p-8 text-center bg-white"><h6 class="text-lg font-bold underline mb-4">AFFIDAVIT OF ACKNOWLEDGEMENT</h6></div>
            </div>
        </div>

        <div class="max-w-[960px] mx-auto">
            <button type="submit" class="w-full bg-[#17a2b8] hover:bg-[#138496] text-white font-bold py-4 rounded uppercase tracking-[5px] text-xl transition shadow-lg border border-[#17a2b8]">SAVE</button>
        </div>
    </form>
</div>

<script>
    function showP(id) {
        document.getElementById('page1').classList.toggle('hidden', id !== 'page1');
        document.getElementById('page2').classList.toggle('hidden', id !== 'page2');
        document.getElementById('p1').className = (id === 'page1') ? 'btn-outline-info active' : 'btn-outline-info';
        document.getElementById('p2').className = (id === 'page2') ? 'btn-outline-info active' : 'btn-outline-info';
    }
</script>
@endsection
