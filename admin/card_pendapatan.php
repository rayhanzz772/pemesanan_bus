<div class="col-xl-4 col-md-4 mb-4">
                            <div class="card border-bottom-primary shadow h-30 py-2" style="margin-bottom:25px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Monthly)</div>
                                            <div class="h3 mb-0 font-weight-bold text-gray-800">
                                                
                                            <?php
                                            echo "$total_transaksi";
                                            ?>
                                        
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x  text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-bottom-success shadow h-30 py-2" style="margin-bottom:25px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                                Daily Earning</div>
                                            <div class="h3 mb-0 font-weight-bold text-gray-800">


                                            <!-- Data -->
                                            <?php
                                            echo "$total_transaksi_hari_ini";    
                                            ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card border-bottom-info shadow h-20 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">JUMLAH USER
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h3 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?php
                                                        echo "$total_id";

                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>