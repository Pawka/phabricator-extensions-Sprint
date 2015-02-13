<?php
final class SprintControllerTest extends SprintTestCase {

  public function testshouldAllowPublic()  {
    $stub = $this->getMockForAbstractClass('SprintController');

    $this->assertTrue($stub->shouldAllowPublic());
  }

  public function testbuildSideNavView() {
    $stub = $this->getMockForAbstractClass('SprintController');
    $user = $this->generateNewTestUser();
    $uri = new PhutilURI('/project/sprint/');
    $nav = $stub->buildSideNavView($for_app = false, $user, $uri);
    $this->assertInstanceOf('AphrontSideNavFilterView', $nav);
  }

  public function testgetCrumbs() {
    $projectobj = new PhabricatorProject();
    $dv = new SprintDataViewController();
    $app = new SprintApplication();
    $dv->setCurrentApplication($app);
    $can_create = true;
    $crumbs = $dv->getCrumbs($projectobj, $can_create);
    $this->assertInstanceOf('PHUICrumbsView', $crumbs);
  }

  public function testgetSprintDataView() {
    $projectobj = new PhabricatorProject();
    $viewer = $this->generateNewTestUser();
    $request = new AphrontRequest('phab.wmde.de', '/project/sprint/view/18');
    $dv = new SprintDataViewController();
    $burndownview = $dv->getSprintDataView($request, $projectobj, $viewer);
    $this->assertInstanceOf('SprintDataView', $burndownview);
  }

  public function testgetErrorBox() {
    $e = new Exception();
    $dv = new SprintDataViewController();
    $errorbox = $dv->getErrorBox($e);
    $this->assertInstanceOf('PHUIErrorView', $errorbox);
  }

  public function testprocessRequestFail() {
    $dvcontroller = new SprintDataViewController();
    $sprint = new SprintApplication();
    $dvcontroller->setCurrentApplication($sprint);
<<<<<<< HEAD
    $request = new AphrontRequest('phab.wmde.de', '/project/sprint/view/18');
    $data = array();
=======
    $request = new AphrontRequest('phab.wmde.de', '/sprint/view/18');
>>>>>>> d1cf93f00fd019cf2f0d191e99637b63f5a1cf50
    $data['id'] =  3;
    $request->setRequestdata($data);
    $viewer = $this->generateNewTestUser();
    $request->setUser($viewer);
    $dvcontroller->willProcessRequest($data);
    $dvcontroller->setRequest($request);
    $response = $dvcontroller->processRequest();
    $this->assertInstanceOf('Aphront404Response', $response);
  }

<<<<<<< HEAD
//  public function testprocessRequestListController() {
//     $this->willRunTests();
//     $lcontroller = new SprintListController();
//     $sprint = new SprintApplication();
//     $lcontroller->setCurrentApplication($sprint);
//     $request = new AphrontRequest('phab.wmde.de', '/project/sprint/view/18');
//     $viewer = $this->generateNewTestUser();
//     $request->setUser($viewer);
//     $lcontroller->setRequest($request);
//     $response = $lcontroller->processRequest();
//     $this->assertInstanceOf('AphrontWebpageResponse', $response);
//   }
=======
  public function testprocessRequestListController() {
    $lcontroller = new SprintListController();
    $sprint = new SprintApplication();
    $lcontroller->setCurrentApplication($sprint);
    $request = new AphrontRequest('phab.wmde.de', '/sprint/view/18');
    $viewer = $this->generateNewTestUser();
    $request->setUser($viewer);
    $lcontroller->setRequest($request);
    $response = $lcontroller->processRequest();
    $this->assertInstanceOf('AphrontWebpageResponse', $response);
  }
>>>>>>> d1cf93f00fd019cf2f0d191e99637b63f5a1cf50
}
