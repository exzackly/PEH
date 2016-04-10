//
//  ViewController.swift
//  FoxFix
//
//  Created by EXZACKLY on 4/9/16.
//  Copyright © 2016 EXZACKLY. All rights reserved.
//

import UIKit

class ViewController: UITableViewController {

    var uid: Int?
    var loginFilePath: String {
        return (NSFileManager.defaultManager().URLsForDirectory(.DocumentDirectory, inDomains: .UserDomainMask).first! as NSURL).URLByAppendingPathComponent("login").path!
    }
    var improvementsArray = [(iid: String, name: String, description: String,lifecyclePhase: String, likeCount: Int)]()
    
    override func viewDidAppear(animated: Bool) {
        super.viewDidAppear(animated)
        verifyLogin()
        parseImprovements()
    }
    
    override func prepareForSegue(segue: UIStoryboardSegue, sender: AnyObject?) {
        if segue.identifier == "detail" {
            if let designationVC = segue.destinationViewController as? ImprovementDetailViewController,
                cell = sender as? UITableViewCell,
                row = tableView.indexPathForCell(cell)?.row  {
                designationVC.iid = Int(improvementsArray[row].iid)
                designationVC.uid = uid
            }
        } else {
            if let designationVC = segue.destinationViewController as? addImprovementViewController {
                designationVC.uid = uid
            }
        }
    }
    
    func verifyLogin() {
        uid = NSKeyedUnarchiver.unarchiveObjectWithFile(loginFilePath) as? Int
        if (uid != nil) {
            parseImprovements()
        } else {
            if let loginVC = storyboard?.instantiateViewControllerWithIdentifier("login") as? loginViewController {
                presentViewController(loginVC, animated: true, completion: nil)
            }
        }
    }
    @IBAction func logout(sender: UIBarButtonItem) {
        do {
            try NSFileManager.defaultManager().removeItemAtPath(loginFilePath)
            verifyLogin()
        } catch let error {
            print(error)
        }
    }
    
    func parseImprovements() {
        improvementsArray = []
        do {
            let improvementsSource = try String(contentsOfURL: NSURL(string: "http://www.exzackly7.com/PEH/backend/displayImprovements.php")!)
            for improvements in improvementsSource.componentsSeparatedByString(";") {
                let improvement = improvements.componentsSeparatedByString("#")
                improvementsArray.append((iid: improvement[0], name: improvement[1], description: improvement[2],lifecyclePhase: improvement[3], likeCount: Int(improvement[4])!))
            }
            tableView.reloadData()
        } catch let error {
            print(error)
        }

    }

    //MARK: - Table view
    override func tableView(tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
        return improvementsArray.count
    }
    
    override func tableView(tableView: UITableView, cellForRowAtIndexPath indexPath: NSIndexPath) -> UITableViewCell {
        let cell = tableView.dequeueReusableCellWithIdentifier("cell")!
        
        cell.textLabel?.text = improvementsArray[indexPath.row].name + " - " + improvementsArray[indexPath.row].description
        cell.textLabel?.numberOfLines = 0
        cell.textLabel?.lineBreakMode = .ByWordWrapping
        cell.detailTextLabel?.text = String(improvementsArray[indexPath.row].likeCount) + " ❤️"
        cell.detailTextLabel?.numberOfLines = 0
        cell.detailTextLabel?.lineBreakMode = .ByWordWrapping
        if (indexPath.row%2 == 0) {
            cell.backgroundColor = UIColor(red: 0.93, green: 0.93, blue: 0.93, alpha: 1)
        } else {
            cell.backgroundColor = UIColor.whiteColor()
        }
        
        return cell
    }


}

