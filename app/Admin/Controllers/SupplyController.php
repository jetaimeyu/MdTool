<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\SuppliersAction;
use App\Models\Supply;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Tree\Tools;
use Illuminate\Support\Carbon;

class SupplyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Supply';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Supply());
        $grid->column('id', __('Id'))->sortable();;
        $grid->column('SupplyName', __('SupplyName'))->sortable();
        $grid->column('SupplyNumber', __('SupplyNumber'));
        $grid->column('SupplyItemID', __('SupplyItemID'));
        $grid->column('Status', __('Status'))->sortable();
        $grid->column('mainFactory.Name', '主机厂名称')->sortable();
        $grid->column('MainFactoryCompID', __('MainFactoryCompID'));
        $grid->column('Supporter', '实施人员');
        $grid->column('SupporterType', '实施方式');
        $grid->column('IsUsed', '使用情况');
        $grid->column('Note', '备注');
        $grid->column('created_at', __('Created at'))->display(function ($created_at) {
            return Carbon::createFromTimeString($created_at)->format('Y-m-d H:i:s');
        })->sortable();
        $grid->tools(function (Grid\Tools $tools) {
            return $tools->append(new SuppliersAction());
        });
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->like('mainFactory.Name', '主机厂名称');
            $filter->like('SupplyName', '供应商名称');
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

        $form->text('SupplyName', __('SupplyName'));
        $form->text('SupplyNumber', __('SupplyNumber'));
        $form->text('SupplyItemID', __('SupplyItemID'));
        $form->number('Status', __('Status'));
        $form->number('MainFactoryCompID', __('MainFactoryCompID'));

        return $form;
    }
}
