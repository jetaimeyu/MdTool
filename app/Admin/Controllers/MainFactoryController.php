<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Member\ImportAction;
use App\Models\MainFactory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
use Illuminate\Support\Carbon;

class MainFactoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'MainFactory';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new MainFactory());
        $grid->column('id', __('Id'))->sortable();
        $grid->column('Name', __('Name'))->expand(function ($model){
            $comments = $model->suppliers->take(10)->map(function ($supply) {
                return $supply->only(['SupplyName','SupplyNumber']);
            });
            return new Table(['SupplyName','SupplyNumber'], $comments->toArray());
        });
        $grid->column('CompID', __('CompID'));
        $grid->column('Status', __('Status'));
        $grid->column('created_at', __('Created at'))->display(function ($created_at){
            return Carbon::createFromTimeString($created_at)->format('Y-m-d H:i:s');
        });
//        $grid->column('updated_at', __('Updated at'));
        // 添加到列表上
        $grid->tools(function (Grid\Tools $tools) {
            $tools->append(new ImportAction());
        });
        $grid->filter(function($filter){

            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            // 在这里添加字段过滤器
            $filter->like('Name', 'Name');

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
        $show = new Show(MainFactory::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('Name', __('Name'));
        $show->field('CompID', __('CompID'));
        $show->field('Status', __('Status'));
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
        $form = new Form(new MainFactory());

        $form->text('Name', __('Name'));
        $form->number('CompID', __('CompID'));
        $form->number('Status', __('Status'));

        return $form;
    }
}
