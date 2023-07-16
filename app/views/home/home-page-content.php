<div class="content">

    <h1 class="api-header"><span class="fl">D</span>ocker App</h1>

    <div class="enter-numbers mb-5">

        <div class="row">

          <div class="col-md-6">

              <h4 class="mb-5">Введите минимальное и максимальное число для генерации</h4>

                <div class="row">
                    <div class="col-md-6">
                         <div class="form-row">

                             <div class="form-group">
                               <input type="text"
                                 class="form-control"
                                 id="min-number"
                                 maxlength="8"
                                 placeholder="Введите минимальное число"
                                 autocomplete="off">
                             </div>

                         </div>
                     </div>

                     <div class="col-md-6">

                         <div class="form-row">

                             <div class="form-group">
                               <input type="text"
                                 class="form-control"
                                 id="max-number"
                                 maxlength="8"
                                 placeholder="Введите максимальное число"
                                 autocomplete="off">
                             </div>

                         </div>
                     </div>

                  </div><!-- end row -->

            </div><!-- end col-md-6 -->

            <div class="col-md-6">
                <h4 class="retrive-header">Получить число по 'id'</h4>

                <div class="col-md-6 retrive-form">

                    <div class="form-row">

                        <div class="form-group">
                          <input type="text"
                            class="form-control"
                            id="find-number"
                            maxlength="8"
                            placeholder="Введите 'id' числа"
                            autocomplete="off">
                        </div>

                    </div>
                </div>
            </div>

     </div><!-- end row -->

    </div>

 <div class="row">

      <div class='col-md-6 mb-4'>
          <div class='card generate-numbers'
              data-value="generate-numbers">

              <div class='card-body'>
                  <h5 class='card-title'>Сгенерировать числа</h5>
              </div>

          </div>
      </div>

      <div class='col-md-6 mb-4'>
          <div><span class="retrieved-number"></span></div>
      </div>

 </div>

</div>

<div class="row number-results"></div>
