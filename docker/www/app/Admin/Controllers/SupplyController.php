<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\SuppliersAction;
use App\Models\Supply;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Tree\Tools;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class SupplyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '供应商';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Supply());
        $grid->column('SupplyNumber', __('供应商编号'))->hide();
        $grid->column('SupplyItemID', __('供应商ID'))->hide();
        $grid->column('MainFactoryCompID', __('主机厂企业ID'))->hide();
        $grid->column('SupplyCompID', '供应商企业ID')->hide();
        $grid->column('id', __('Id'))->sortable()->hide();
        $grid->column('SupplyName', '供应商名称')->sortable();
        $grid->column('mainFactory.Name', '主机厂名称')->sortable();
        $grid->column('mdt', '通号');
        $grid->column('Status', __('签约状态'))->using([1 => '未签约', 2 => '已签约'])->label([1 => 'danger', 2 => 'success'])->sortable();
        $grid->column('Supporter', '实施人员');
        $grid->column('SupporterType', '实施方式')->using([0 => '未实施', 1 => '上门实施', 2 => '远程实施'], '未实施')->label([0 => 'default', 1 => 'success', 2 => 'info', '未实施' => 'default']);
        $grid->column('IsUsed', '使用情况')->using([0 => '未知', 1 => '已使用', 2 => '未使用'])->label([0 => 'default', 1 => 'success', 2 => 'danger'], 'default');
        $grid->column('Note', '备注')->display(function ($note) {
            return "<span style='color:blue' title='$note' data-title='$note'>" . Str::limit($note, 6) . "</span>";
        });
        $grid->column('created_at', __('创建时间'))->display(function ($created_at) {
            return Carbon::createFromTimeString($created_at)->format('Y-m-d H:i:s');
        })->sortable();
        $grid->tools(function (Grid\Tools $tools) {
            return $tools->append(new SuppliersAction());
        });

        $grid->filter(function ($filter) {
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->column(1 / 3, function ($filter) {
                $filter->like('mainFactory.Name', '主机厂名称');
                $filter->like('SupplyName', '供应商名称');
                $filter->like('Supporter', '实施人员');
            });
            $filter->column(1 / 3, function ($filter) {
                $filter->equal('Status', '签约状态')->select([1 => '未签约', 2 => '已签约']);
                $filter->equal('SupporterType', '实施方式')->select([0 => '未实施', 1 => '上门实施', 2 => '远程实施']);
                $filter->equal('IsUsed', '使用情况')->select([0 => '未知', 1 => '已使用', 2 => '未使用']);
            });
        });

        $grid->actions(function ($actions) {
            // 去掉删除
            $actions->disableDelete();
            // 去掉编辑
            //           $actions->disableEdit();
            // 去掉查看
            $actions->disableView();
        });
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Supply::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('SupplyName', __('SupplyName'));
        $show->field('SupplyNumber', __('SupplyNumber'));
        $show->field('SupplyItemID', __('SupplyItemID'));
        $show->field('Status', __('Status'));
        $show->field('MainFactoryCompID', __('MainFactoryCompID'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Supply());
        $form->tab('固定信息', function ($form) {
            if (Route::currentRouteName() == 'admin.supplies.create') {
                $form->text('SupplyName', '供应商名称')->required();
                $form->text('SupplyNumber', '供应商编号')->required();
                $form->text('SupplyItemID', '供应商ID')->required();
                $form->text('MainFactoryCompID', "主机厂企业ID")->required();
            } else {
                $form->display('SupplyName', '供应商名称');
                $form->display('SupplyNumber', '供应商编号');
                $form->display('SupplyItemID', '供应商ID');
                $form->display('MainFactoryCompID', "主机厂企业ID");
            }
        })->tab('可编辑信息', function ($form) {
            $form->text('SupplyCompID', '供应商企业ID')->required()->autofocus();
            $form->select('Status', '签约状态')->options([
                1 => '未签约',
                2 => '已签约',
            ])->default(1);
            $form->text('mdt', '迈迪通号');
            $form->text('Supporter', '实施人员');
            $form->select('SupporterType', '实施方式')->options([0 => '未实施', 1 => '上门实施', 2 => '远程实施'])->default(0);
            $form->select('IsUsed', '使用状态')->options([0 => '未知', 1 => '已使用', 2 => '未使用'])->default(0);
            $form->textarea('Note', '备注');
        });
        $form->tools(function (Form\Tools $tools) {
            // 去掉`列表`按钮
            //$tools->disableList();
            // 去掉`删除`按钮
            $tools->disableDelete();
            // 去掉`查看`按钮
            $tools->disableView();
        });
        $form->footer(function ($footer) {
            // 去掉`重置`按钮
            $footer->disableReset();
            // 去掉`提交`按钮
            //  $footer->disableSubmit();
            // 去掉`查看`checkbox
            $footer->disableViewCheck();
            // 去掉`继续编辑`checkbox
            $footer->disableEditingCheck();
            // 去掉`继续创建`checkbox
            $footer->disableCreatingCheck();
        });

        return $form;
    }
}
