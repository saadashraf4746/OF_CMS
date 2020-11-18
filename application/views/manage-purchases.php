<!DOCTYPE html>
<html lang="en-US">
<head>
	<title><?=$headTittle?></title>
	<?php $this->load->view('includes/header-includes'); ?>
</head>
<body class="dashbaord-body" dir="<?=$dir?>">
	<!-- left menu -->
	<?php $this->load->view('includes/left-menu'); ?>

	<div class="dashboard-content">



		<div class="row sticky">
			<div class="col-md-12">
				<a href="<?=base_url('manage-factory/'.$this->session->userdata('season-id'))?>" class="mr-2 bg-dark float-left" style="padding: 5px; display: inline" >
					<i class="fa fa-arrow-left text-white" aria-hidden="true"></i>
				</a>
				<h3 style="float: <?=$float?>"><?=$heading?></h3>
				<a href="<?=base_url('manage-factory/purchase-kinow/')?>" class="btn btn-warning float-right mb-2" style="padding: 5px; display: inline" >
					Purchase
				</a>
			</div>
			<div class="col-md-12">
				<?php if($this->session->flashdata('success_add_kinow')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('success_add_kinow'); ?>
					</div>
				<?php } ?>
			</div>

		</div>

		<div class="row">
			<div class="col-md-12">
				<h4 class="text-center bg-dark" style="color:white"><?=$this->lang->line('purchases_details')?></h4>
				<table class="custom-table text-center">
					<thead>
						<tr>
							<th><?=$this->lang->line('things')?></th>
							<th><?=$this->lang->line('description')?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><strong><?=$this->lang->line('total_purchases')?></strong></td>
							<td><strong><?=numberFormat($seasonPurchasesStatistics->seasonTotalPurchases)?> Rs</td>
						</tr>
						<tr>
							<td><strong><?=$this->lang->line('total_paid')?></strong></td>
							<td><strong><?=numberFormat($seasonPurchasesStatistics->seasonTotalPaid)?> Rs</strong></td>
						</tr>
						<tr>
							<td><strong><?=$this->lang->line('total_pendings')?></strong></td>
							<td><?=$balanceStatus?></td>
						</tr>
						<tr>
							<td><strong><?=$this->lang->line('total_suppliers')?></strong></td>
							<td><?=$seasonPurchasesStatistics->totalSuppliers?> Supplier(s)</td>
						</tr>
					</tbody>
				</table>
			</div>
			<br>
			<br>
		</div>

		<div class="row">
			<div class="col-md-12">
				<h4 class="text-center bg-dark" style="color:white"><?=$this->lang->line('manage_suppliers')?></h4>
				<?php if($this->session->flashdata('success_add_supplier')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('success_add_supplier'); ?>
					</div>
				<?php } ?>
				<?php if($this->session->flashdata('global_delete_message_supplier_list')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('global_delete_message_supplier_list'); ?>
					</div>
				<?php } ?>
			</div>
			<div class="col-md-3 mb-2" id="addSupplierSection" style="background: #CDDEDE;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
				<h3><?=$this->lang->line('add_supplier')?></h3>
				<form id="addSupplier" method="POST" action="<?=base_url('factory/managePurchases')?>">
					<label><?=$this->lang->line('supplier_name')?></label>
					<input type="text" name="name" class="form-control" placeholder="<?=$this->lang->line('ph_supplier_name')?>">
					<label><?=$this->lang->line('supplier_phone')?></label>
					<input type="text" name="phone" class="form-control phone-validation" placeholder="<?=$this->lang->line('ph_supplier_phone')?>" />
					<button class="btn btn-small btn-warning mt-2" name="addSupplier" type="submit"><?=$this->lang->line('add_supplier')?></button>
				</form>
			</div>
			<div class="col-md-3 mb-2" id="editSupplierSection" style="background: #f3a8a8;padding: 14px;border: 1px solid #fb9e9e;border-radius: 8px;display: none;">
				<h3><?=$this->lang->line('edit_supplier')?></h3>
				<form id="addSupplier" method="POST" action="<?=base_url('factory/editSupplier')?>">
					<input type="hidden" name="supplierId" id="supplierIdSupplierEdit">
					<input type="hidden" name="url" id="url_supplier_edit">
					<label><?=$this->lang->line('supplier_name')?></label>
					<input type="text" name="name" id="nameEditSupplier" class="form-control" >
					<label><?=$this->lang->line('supplier_phone')?></label>
					<input type="text" name="phone" id="phoneEditSupplier" class="form-control phone-validation" />
					<button class="btn btn-small btn-warning mt-2" name="addSupplier" type="submit"><?=$this->lang->line('edit_supplier')?></button>
				</form>
			</div>
			<div class="col-md-9">
				<table class="table table-bordered table-sm datatable">
					<thead>
						<tr>
							<th>#</th>
							<th><?=$this->lang->line('supplier_name')?></th>
							<th><?=$this->lang->line('supplier_phone')?></th>
							<th>Balance</th>
							<th><?=$this->lang->line('action')?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(count($suppliers)==0)
						{
							?>
							<tr>
								<td></td>
								<td><?=$this->lang->line('no_record_found')?></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<?php
						}
						else
						{
							$count = 0;
							foreach($suppliers as $supplier):
								?>
								<tr id="supplier_edit_row_<?=$supplier->id?>"
									<?php if($supplier->id == $this->session->userdata('supplier-add-edit'))
									{ 
										echo 'class="recentlyUpdated"';
									}
									?>
								>
									<td><?=++$count;?></td>
									<td><?=$supplier->name;?></td>
									<td><?=$supplier->phone;?></td>
									<td>
										<strong style="color: green; font-weight: bold">Total Purchase: </strong>
										<?=numberFormat($this->Common_model->getTotalPurchaseAmount($seasonId, $supplier->id));?> Rs
										<br/>
										<strong style="color: black; font-weight: bold">Total Paid: </strong>
										<?=numberFormat($this->Common_model->getTotalPaidAmount($seasonId, $supplier->id, 1));?> Rs
									</td>
									<td>
										<a href="<?=base_url('manage-purchases/supplier-detail/'.$supplier->id)?>" class="bg-dark mb-1">
											<i class="fa fa-tasks" style="padding: 5px;color: white" aria-hidden="true"></i>
										</a> 
										<a href="" class="bg-dark editSupplier" this-id="<?=$supplier->id?>" this-url="<?=$url?>">
											<i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
										</a>
										<a data-href="<?=base_url('CommonController/GLOBAL_DELETE/suppliers/'.$supplier->id.'/'.$url.'/supplier_list')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
											<i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
										</a>
									</td>
								</tr>
								<?php
							endforeach;
							$this->session->unset_userdata('supplier-add-edit');
						}
						?>
					</tbody>
				</table>
			</div>

			<div class="col-md-12 mt-3">
				<h4 class="text-center bg-dark" style="color:white">Kinow Purchases List</h4>
				<?php if($this->session->flashdata('test')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('test'); ?>
					</div>
				<?php } ?>
				<?php if($this->session->flashdata('global_delete_message_supplier_list')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('global_delete_message_supplier_list'); ?>
					</div>
				<?php } ?>
			</div>
			<div class="col-md-12">
				<table class="table table-bordered table-sm datatable">
					<thead>
						<tr>
							<th>#</th>
							<th>Landlord, Location, Purchase Amount</th>
							<th>Total Maan</th>
							<th>Total A</th>
							<th>Total B</th>
							<th>Total Price</th>
							<th>Completed</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(count($kinowPurchases)==0)
						{
							?>
							<tr>
								<td></td>
								<td><?=$this->lang->line('no_record_found')?></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<?php
						}
						else
						{
							$count = 0;
							foreach($kinowPurchases as $kinowPurchases):
								?>
								<tr
									<?php if($kinowPurchases->gardenId == $this->session->userdata('kinow-purchase-add-edit'))
									{ 
										echo 'class="recentlyUpdated"';
									}
									?>>
									<td><?=++$count;?></td>
									<td><?='<span style="font-size:12px;font-weight:bold">'.$kinowPurchases->landlordName.'</span><br/><span style="font-size:12px;font-weight:bold">'.$kinowPurchases->gardenLocation.'</strong><br/><strong style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px">'.numberFormat($kinowPurchases->purchaseAmount).' Rs<strong/>';?></td>
									<td>
										<strong style="color: #f7b148; font-weight: bold"><?=numberFormat($kinowPurchases->totalQuantityInMaan);?></strong>
										
									</td>
									<td>
										<strong style="color: #f7b148; font-weight: bold">
											<?=numberFormat($kinowPurchases->totalACategory)?>
										</strong>
									</td>
									<td>
										<strong style="color: #f7b148; font-weight: bold">
											<?=numberFormat($kinowPurchases->totalBCategory)?>
										</strong>
									</td>
									<td>
										<strong style="color: green; font-weight: bold">
											<?=numberFormat($kinowPurchases->totalPrice)?> Rs
										</strong>
									</td>
									<td>
										<?=$kinowPurchases->isCompleted==0?'<strong style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px">No<strong/>':'<strong style="color:white;background:#ff2b2b;font-weight:bold;padding:2px;border-radius:5px">Yes<strong/>'?>
									</td>
									<td>
										<a href="<?=base_url('manage-purchases/kinow-purchase-detail/'.$kinowPurchases->gardenId)?>" class="bg-dark mb-1">
											<i class="fa fa-tasks" style="padding: 5px;color: white" aria-hidden="true"></i>
										</a> 
									</td>
								</tr>
							<?php
							endforeach;
						}
						?>
					</tbody>
				</table>
			</div>

			<div class="col-md-12 mt-2">
				<h4 class="text-center bg-dark" style="color:white">Purchases List</h4>
				<?php if($this->session->flashdata('success_edit_purchase')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('success_edit_purchase'); ?>
					</div>
				<?php } ?>
				<?php if($this->session->flashdata('global_delete_message_purrchases_list')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('global_delete_message_purrchases_list'); ?>
					</div>
				<?php } ?>
			</div>

			<div class="col-md-12">
				<table class="table table-bordered table-sm datatable">
					<thead>
						<tr>
							<th>#</th>
							<th>Purchase Date</th>
							<th>Supplier, Item</th>
							<th>Item Detail 1</th>
							<th>Item Detail 2</th>
							<th>Item Detail 3</th>
							<th>Total Price</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(count($purchasesList)==0)
						{
							?>
							<tr>
								<td></td>
								<td><?=$this->lang->line('no_record_found')?></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<?php
						}
						else
						{
							$count = 0;
							foreach($purchasesList as $item):
								$supplier = $this->Common_model->getRecord($item->supplierId, 'suppliers');
								if($item->item == 1){
								?>
								<tr
									<?php if($item->id == $this->session->userdata('purchases-list-add-edit'))
									{ 
										echo 'class="recentlyUpdated"';
									}
									?>>
									<td><?=++$count;?></td>
									<td><?=dateConvertDMY($item->purchaseDate);?></td>
									<td><?=$supplier->name.'<br/><strong style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px">'.checkItem($item->item).'<strong/>';?></td>
									<?php
									if($item->charPathiQuantity == '0' && $item->charPathiAmount == '0')
									{
									?>
										<td>-</td>
									<?php
									}
									else
									{
									?>
										<td>
											<strong style="color: #f7b148; font-weight: bold">4Pathi Total: </strong>
											<?=numberFormat($item->charPathiQuantity * $item->charPathiAmount);?> Rs
											<br/>
											<strong style="color: green; font-weight: bold">4Pathi Quantity: </strong>
											<?=numberFormat($item->charPathiQuantity)?> Rs
											<br/>
											<strong style="color: black; font-weight: bold">4Pathi price: </strong>
											<?=numberFormat($item->charPathiAmount);?> Rs
										</td>
									<?php
									}

									if($item->panchPathiQuantity == '0' && $item->panchPathiAmount == '0')
									{
									?>
										<td>-</td>
									<?php
									}
									else
									{
									?>
										<td>
											<strong style="color: #f7b148; font-weight: bold">5Pathi Total: </strong>
											<?=numberFormat($item->panchPathiQuantity * $item->panchPathiAmount);?> Rs
											<br/>
											<strong style="color: green; font-weight: bold">5Pathi Quantity: </strong>
											<?=numberFormat($item->panchPathiQuantity)?> Rs
											<br/>
											<strong style="color: black; font-weight: bold">5Pathi price: </strong>
											<?=numberFormat($item->panchPathiAmount);?> Rs
										</td>
									<?php
									}
									if($item->sheyPathiQuantity == '0' && $item->sheyPathiAmount == '0')
									{
									?>
										<td>-</td>
									<?php
									}
									else
									{
									?>
										<td>
											<strong style="color: #f7b148; font-weight: bold">6Pathi Total: </strong>
											<?=numberFormat($item->sheyPathiQuantity * $item->sheyPathiAmount);?> Rs
											<br/>
											<strong style="color: green; font-weight: bold">6Pathi Quantity: </strong>
											<?=numberFormat($item->sheyPathiQuantity)?> Rs
											<br/>
											<strong style="color: black; font-weight: bold">6Pathi price: </strong>
											<?=numberFormat($item->sheyPathiAmount);?> Rs
										</td>
									<?php
									}
									?>
									<td><?=numberFormat($item->totalAmount);?> Rs</td>

									<td>
										<a href="<?=base_url('manage-purchases/edit-purchase-item/'.$item->id.'/'.$url)?>" class="bg-dark">
											<i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
										</a>
										<a data-href="<?=base_url('CommonController/GLOBAL_DELETE/purchases/'.$item->id.'/'.$url.'/purrchases_list')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
											<i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
										</a>
									</td>
								</tr>
								<?php
								}
								else if($item->item == 5)
								{
								?>
								<tr
									<?php if($item->id == $this->session->userdata('purchases-list-add-edit'))
									{ 
										echo 'class="recentlyUpdated"';
									}
									?>>
									<td><?=++$count;?></td>
									<td><?=dateConvertDMY($item->purchaseDate);?></td>
									<td><?=$supplier->name.'<br/><strong style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px">'.checkItem($item->item).'<strong/>';?></td>
									<?php
									if($item->doPlySheetQuantity == '0' && $item->doPlySheetAmount == '0')
									{
									?>
										<td>-</td>
									<?php
									}
									else
									{
									?>
										<td>
											<strong style="color: #f7b148; font-weight: bold">2Ply Total: </strong>
											<?=numberFormat($item->doPlySheetQuantity * $item->doPlySheetAmount);?> Rs
											<br/>
											<strong style="color: green; font-weight: bold">2Ply Quantity: </strong>
											<?=numberFormat($item->doPlySheetQuantity)?> Rs
											<br/>
											<strong style="color: black; font-weight: bold">2Ply price: </strong>
											<?=numberFormat($item->doPlySheetAmount);?> Rs
										</td>
									<?php
									}
									if($item->teenPlySheetQuantity == '0' && $item->teenPlySheetAmount == '0')
									{
									?>
										<td>-</td>
									<?php
									}
									else
									{
									?>
										<td>
											<strong style="color: #f7b148; font-weight: bold">3Ply Total: </strong>
											<?=numberFormat($item->teenPlySheetQuantity * $item->teenPlySheetAmount);?> Rs
											<br/>
											<strong style="color: green; font-weight: bold">3Ply Quantity: </strong>
											<?=numberFormat($item->teenPlySheetQuantity)?> Rs
											<br/>
											<strong style="color: black; font-weight: bold">3Ply price: </strong>
											<?=numberFormat($item->teenPlySheetAmount);?> Rs
										</td>
									<?php
									}
									if($item->panchPlySheetQuantity == '0' && $item->panchPlySheetAmount == '0')
									{
									?>
										<td>-</td>
									<?php
									}
									else
									{
									?>
										<td>
											<strong style="color: #f7b148; font-weight: bold">5Ply Total: </strong>
											<?=numberFormat($item->panchPlySheetQuantity * $item->panchPlySheetAmount);?> Rs
											<br/>
											<strong style="color: green; font-weight: bold">5Ply Quantity: </strong>
											<?=numberFormat($item->panchPlySheetQuantity)?> Rs
											<br/>
											<strong style="color: black; font-weight: bold">5Ply price: </strong>
											<?=numberFormat($item->panchPlySheetAmount);?> Rs
										</td>
									<?php
									}
									?>
									<td><?=numberFormat($item->totalAmount);?></td>
									<td>
										<a href="<?=base_url('manage-purchases/edit-purchase-item/'.$item->id.'/'.$url)?>" class="bg-dark">
											<i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
										</a>
										<a data-href="<?=base_url('CommonController/GLOBAL_DELETE/purchases/'.$item->id.'/'.$url.'/purrchases_list')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
											<i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
										</a>
									</td>
								</tr>
								<?php
								}
								else if($item->item == 2 )
								{
								?>
								<tr
									<?php if($item->id == $this->session->userdata('purchases-list-add-edit'))
									{ 
										echo 'class="recentlyUpdated"';
									}
									?>>
									<td><?=++$count;?></td>
									<td><?=dateConvertDMY($item->purchaseDate);?></td>
									<td><?=$supplier->name.'<br/><strong style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px">'.checkItem($item->item).'<strong/>';?></td>
									<td>
										<strong style="color: #f7b148; font-weight: bold">Radi Total: </strong>
										<?=numberFormat($item->radiQuantity * $item->radiAmount);?> Rs
										<br/>
										<strong style="color: green; font-weight: bold">Quantity: </strong>
										<?=numberFormat($item->radiQuantity)?> Rs
										<br/>
										<strong style="color: black; font-weight: bold">price: </strong>
										<?=numberFormat($item->radiAmount);?> Rs
									</td>
									<td>-</td>
									<td>-</td>
									<td><?=numberFormat($item->totalAmount);?> Rs</td>
									<td>
										<a href="<?=base_url('manage-purchases/edit-purchase-item/'.$item->id.'/'.$url)?>" class="bg-dark">
											<i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
										</a>
										<a data-href="<?=base_url('CommonController/GLOBAL_DELETE/purchases/'.$item->id.'/'.$url.'/purrchases_list')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
											<i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
										</a>
									</td>
								</tr>
								<?php
								}
								else if($item->item == 3)
								{
								?>
								<tr
									<?php if($item->id == $this->session->userdata('purchases-list-add-edit'))
									{ 
										echo 'class="recentlyUpdated"';
									}
									?>>
									<td><?=++$count;?></td>
									<td><?=dateConvertDMY($item->purchaseDate);?></td>
									<td><?=$supplier->name.'<br/><strong style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px">'.checkItem($item->item).'<strong/>';?></td>
									<td>
										<strong style="color: #f7b148; font-weight: bold">Keel Total: </strong>
										<?=numberFormat($item->keelQuantity * $item->keelAmount);?> Rs
										<br/>
										<strong style="color: green; font-weight: bold">Bori Quantity: </strong>
										<?=numberFormat($item->keelQuantity)?> Rs
										<br/>
										<strong style="color: black; font-weight: bold">Per Price: </strong>
										<?=numberFormat($item->keelAmount);?> Rs
									</td>
									<td>-</td>
									<td>-</td>
									<td><?=numberFormat($item->totalAmount);?> Rs</td>
									<td>
										<a href="<?=base_url('manage-purchases/edit-purchase-item/'.$item->id.'/'.$url)?>" class="bg-dark">
											<i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
										</a>
										<a data-href="<?=base_url('CommonController/GLOBAL_DELETE/purchases/'.$item->id.'/'.$url.'/purrchases_list')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
											<i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
										</a>
									</td>
								</tr>
								<?php
								}
								else if($item->item == 4)
								{
								?>
								<tr
									<?php if($item->id == $this->session->userdata('purchases-list-add-edit'))
									{ 
										echo 'class="recentlyUpdated"';
									}
									?>>
									<td><?=++$count;?></td>
									<td><?=dateConvertDMY($item->purchaseDate);?></td>
									<td><?=$supplier->name.'<br/><strong style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px">'.checkItem($item->item).'<strong/>';?></td>
									<td>
										<strong style="color: #f7b148; font-weight: bold">Sticker Total: </strong>
										<?=numberFormat($item->stickerQuantity * $item->stickerAmount);?> Rs
										<br/>
										<strong style="color: green; font-weight: bold">Stiker Quantity: </strong>
										<?=numberFormat($item->stickerQuantity)?> Rs
										<br/>
										<strong style="color: black; font-weight: bold">Per Price: </strong>
										<?=numberFormat($item->stickerAmount);?> Rs
									</td>
									<td>-</td>
									<td>-</td>
									<td><?=numberFormat($item->totalAmount);?> Rs</td>
									<td>
										<a href="<?=base_url('manage-purchases/edit-purchase-item/'.$item->id.'/'.$url)?>" class="bg-dark">
											<i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
										</a>
										<a data-href="<?=base_url('CommonController/GLOBAL_DELETE/purchases/'.$item->id.'/'.$url.'/purrchases_list')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
											<i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
										</a>
									</td>
								</tr>
								<?php
								}
								else if($item->item == 6)
								{
								?>
								<tr
									<?php if($item->id == $this->session->userdata('purchases-list-add-edit'))
									{ 
										echo 'class="recentlyUpdated"';
									}
									?>>
									<td><?=++$count;?></td>
									<td><?=dateConvertDMY($item->purchaseDate);?></td>
									<td><?=$supplier->name.'<br/><strong style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px">'.checkItem($item->item).'<strong/>';?></td>
									<td>
										<strong style="color: #f7b148; font-weight: bold">Cotton Total: </strong>
										<?=numberFormat($item->cottonQuantity * $item->cottonAmount);?> Rs
										<br/>
										<strong style="color: green; font-weight: bold">Cotton Quantity: </strong>
										<?=numberFormat($item->cottonQuantity)?> Rs
										<br/>
										<strong style="color: black; font-weight: bold">Per Price: </strong>
										<?=numberFormat($item->cottonAmount);?> Rs
									</td>
									<td>-</td>
									<td>-</td>
									<td><?=numberFormat($item->totalAmount);?> Rs</td>
									<td>
										<a href="<?=base_url('manage-purchases/edit-purchase-item/'.$item->id.'/'.$url)?>" class="bg-dark">
											<i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
										</a>
										<a data-href="<?=base_url('CommonController/GLOBAL_DELETE/purchases/'.$item->id.'/'.$url.'/purrchases_list')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
											<i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
										</a>
									</td>
								</tr>
								<?php	
								}
							endforeach;
							$this->session->unset_userdata('purchases-list-add-edit');
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- footer -->
	<?php $this->load->view('footer-simple'); ?>

</body>
<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function(event) { 
		var scrollpos = localStorage.getItem('scrollpos');
		if (scrollpos) window.scrollTo(0, scrollpos);
	});

	window.onbeforeunload = function(e) {
		localStorage.setItem('scrollpos', window.scrollY);
	};

    $('.editSupplier').click(function(e){
      e.preventDefault();
	  $('tr').removeClass('activeForEdit');

      var supplierId = $(this).attr('this-id');
      var link      = $(this).attr('this-url');
      var table = 'suppliers';
      // console.log(supplierId+' '+link+' '+table );
      $.ajax({              //request ajax
        type: "POST",
        url: "<?=base_url('CommonController/getRecord')?>", 
        data: {id:supplierId,table:table},
        dataType: "json",
        success: function(response) 
        {        	
          $('#addSupplierSection').hide();
          $('#editSupplierSection').show();
          $('#nameEditSupplier').val(response.data.name);
          $('#nameEditSupplier').focus();
          $('#phoneEditSupplier').val(response.data.phone);
          $('#supplierIdSupplierEdit').val(supplierId);
          $('#url_supplier_edit').val(link);
          $('#supplier_edit_row_'+supplierId).addClass('activeForEdit');

        },
        error: function()
        {
          console.log('ERROR');
        }
      });
    });
</script>
</html>